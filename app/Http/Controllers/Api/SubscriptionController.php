<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\{
    SubscriptionRepository,
    BillRepository,
    TenantStorRepository,
    AffiliateAdminRepository
};
use App\Models\User;
use App\Models\Store;
use App\Models\Tenant;
use App\Models\Plan;
use App\Facade\Tenants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    protected $subscriptions, $bills, $tenantStor, $affiliate;

    public function __construct(
        SubscriptionRepository $subscriptions,
        BillRepository $bills,
        TenantStorRepository $tenantStor,
        AffiliateAdminRepository $affiliate
    ) {
        $this->subscriptions = $subscriptions;
        $this->bills = $bills;
        $this->tenantStor = $tenantStor;
        $this->affiliate = $affiliate;
    }

    public function index()
    {
        $subscription = $this->subscriptions->paginate(10);
        return response()->apiSuccess($subscription, 'Subscriptions fetched successfully');
    }

    public function bills()
    {
        $bills = $this->bills->paginate(10);
        return response()->apiSuccess($bills, 'Bills fetched successfully');
    }

    public function active(Request $request, $id)
    {
        $tenantStor = $this->tenantStor->find($id);

        if (!$tenantStor) {
            return response()->apiFail('Tenant Store not found', 404);
        }

        $tenantStor->update(['active' => $request->status]);

        $mainUser = User::find($tenantStor->user_id);
        if (!$mainUser) {
            return response()->apiFail('User not found', 404);
        }

        $mainUser->update(['subscription' => $id]);

        $tenant = Tenant::find($tenantStor->tenant_id);
        if (!$tenant) {
            return response()->apiFail('Tenant not found', 404);
        }

        Tenants::switchTenant($tenant);

        $tenantPlan = Plan::first();
        if ($tenantPlan) {
            $tenantPlan->update(['active' => $request->status]);
        }

        Cache::forget('plan_' . $tenant->domain);

        return response()->apiSuccess(null, 'Tenant subscription status updated');
    }

    public function subscribe(Request $request, $id)
    {
        $store = Store::first();
        if (!$store) {
            return response()->apiFail('Store not found', 404);
        }

        Tenants::switchLandlord();

        $subscription = $this->subscriptions->find($id);
        if (!$subscription) {
            return response()->apiFail('Subscription not found', 404);
        }

        $tenantStor = $this->tenantStor->findByName($store->name);
        if (!$tenantStor) {
            return response()->apiFail('Tenant Store not found', 404);
        }

        $mainUser = User::find($tenantStor->user_id);
        if (!$mainUser) {
            return response()->apiFail('Main user not found', 404);
        }

        $mainUser->update(['subscription' => $id]);

        if ($mainUser->affiliate && $id != 1) {
            $this->affiliate->updateAffiliateStats($mainUser->affiliate, $subscription->price);
        }

        $tenant = Tenant::find($tenantStor->tenant_id);
        if (!$tenant) {
            return response()->apiFail('Tenant not found', 404);
        }

        Tenants::switchTenant($tenant);

        $user = Auth::user();
        if (!$user) {
            return response()->apiFail('Authenticated user not found', 403);
        }

        $user->subscription = $subscription->id;
        $user->subscriptionPeriod = Carbon::now()->addDays($subscription->duration);
        $user->save();

        $this->bills->create([
            'plan_id' => $subscription->id,
            'price' => $subscription->price,
            'duration' => $subscription->duration,
            'subscriptionPeriod' => Carbon::now()->addDays($subscription->duration),
        ]);

        return response()->apiSuccess([
            'subscription' => $subscription,
            'user' => $user,
        ], 'Subscription activated successfully');
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->apiFail('User not authenticated', 403);
        }

        return response()->apiSuccess($user, 'Profile fetched successfully');
    }
}
