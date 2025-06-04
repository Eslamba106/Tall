<?php

namespace App\Http\Controllers;


use App\Models\Bill;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Store;
use App\Models\Tenant;
use App\Facade\Tenants;
use App\Models\TenantStor;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\affiliateAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Subscriptions extends Controller
{
    public function index()  {
        $tenant = Tenants::switchLandlord();
        $subscription = Subscription::latest()->paginate(10);
        return view('subscription.index',compact('subscription'));
    }
    public function bills()  {
        $bills = Bill::latest()->paginate(10);
        return view('subscription.bills',compact('bills'));
    }
    public function profile(Request $request)  {
        return view('profile.editmain', [
            'user' => $request->user(),
        ]);
    }
    public function active(Request $request,$id) {
        $tenantStor = TenantStor::findOrFail($id);
        $tenantStor->active = $request->status;
        $tenantStor->save();
        $mainUser= User::find($tenantStor->user_id);
        $mainUser->subscription = $id;
        $mainUser->save();
        $tenant = Tenant::where('id',$tenantStor->tenant_id)->first();
        Tenants::switchTenant($tenant);
        $tenantPlan = Plan::first();
        $tenantPlan->active = $request->status;
        $tenantPlan->save();
        $cacheKeys = 'plan_' . $tenant->domain;
        Cache::forget($cacheKeys);

        return true;
    }
    public function subscribe(Request $request,$id) {
        $store = Store::first();
        $tenant = Tenants::switchLandlord();
        $subscription = Subscription::find($id);

        $tenantStor = TenantStor::where('name',$store->name)->first();
        $usermain = User::find($tenantStor->user_id);
        $usermain->subscription = $id;
        $usermain->save();
        if ($usermain->affiliate && $id != 1) {
            $aftt = affiliateAdmin::where('code' ,$usermain->affiliate)->first();
            $aftt->number2 = $aftt->number2+1;
            $aftt->total = $aftt->price + $aftt->total;
            $aftt->save();
        }
        $tenant = Tenant::where('id',$tenantStor->tenant_id)->first();
        Tenants::switchTenant($tenant);
        $user = Auth::user();
        $user->subscription = $subscription->id;
        $user->subscriptionPeriod = Carbon::now()->addDays($subscription->duration);
        $user->save();
        $bill = new Bill();
        $bill->plan_id = $subscription->id;
        $bill->price = $subscription->price;
        $bill->subscriptionPeriod =  Carbon::now()->addDays($subscription->duration);
        $bill->duration = $subscription->duration;
        $bill->save();

        return redirect()->back()->with('success', __(key: 'تم تفعيل الاشتراك!'));
    }
}
