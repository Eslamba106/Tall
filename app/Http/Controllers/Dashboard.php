<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Deal;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Estate;
use App\Models\Tenant;
use App\Facade\Tenants;
use App\Models\Visitor;
use App\Models\Customer;
use App\Models\PlanRequst;
use App\Models\TenantStor;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\affiliateAdmin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class Dashboard extends Controller
{
    public function Index(Request $request) {
        $tenant = Tenants::getTenant();
        $user = Auth::user();
        if ($user->super == 1) {
            $allUser = User::count();
            $montheUser = User::where('created_at', '>=', Carbon::now()->subDays(30))->count();
            $weekUser = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();
            $affilate = affiliateAdmin::count();

            $durationUser = User::where('duration', '<=', Carbon::now()->subDays(30))->count();
            $durationUsernot = User::where('duration', '>=', Carbon::now()->subDays(30))->count();

            $freeUser = User::where('subscription', 1)->count();
            $freeUseractive = User::where('duration', '<=', Carbon::now()->subDays(30))->where('subscription', 1)->count();
            $freeUsernot = User::where('duration', '>=', Carbon::now()->subDays(30))->where('subscription', 1)->count();


            $premUser = User::where('subscription','!=', 1)->count();
            $fpremUseractive = User::where('duration', '<=', Carbon::now()->subDays(30))->where('subscription','!=', 1)->count();
            $premUsernot = User::where('duration', '>=', Carbon::now()->subDays(30))->where('subscription','!=', 1)->count();

            return view('indexSuper',compact('allUser','affilate','freeUser','montheUser','weekUser','durationUser','durationUsernot','freeUseractive','freeUsernot',"premUser","fpremUseractive","premUsernot"));
        }
        if (!empty($tenant)) {
            $tenant = Store::first();
            $estate = Estate::count();
            $order = Order::count();
            $deal = Deal::count();
            $deal1 = Deal::where('status',1)->count();
            $deal2 = Deal::where('status',2)->count();
            $deal3 = Deal::where('status',3)->count();
            $deal4 = Deal::where('status',4)->count();
            $deal5 = Deal::where('status',5)->count();
            $customer = Customer::count();
            $totalOrdersData = $this->last30DaysOrderChart($request->timeline);

        return view('adminDashboard',compact('deal',
        'deal1','deal2','deal3','deal4','deal5'
        ,'customer','estate','order','tenant','totalOrdersData'));
        }elseif($user->admin == 1){
            $tenant = Tenant::where('user_id',$user->id)->first();
            $affilate = affiliateAdmin::where('user',$user->id)->first();
            $tenantStor = TenantStor::where('user_id',$user->id)->first();
            $subscription = Subscription::where('id',$user->subscription)->first();
            return view('index',compact('tenant','tenantStor','user','affilate','subscription'));
        }else{
            $tenant = Tenant::where('user_id',$user->id)->first();
            $tenantStor = TenantStor::where('user_id',$user->id)->first();
            $link = 'https://'. $tenantStor->name . '.'. env('HOST_URL').'/autoLoginBase/'.encrypt($tenant->domain);
            // Auth::guard('web')->logout();

            // $request->session()->invalidate();
    
            // $request->session()->regenerateToken();
            return redirect()->away($link);
        }
    }
    public function stores() {
        $user = User::latest()->paginate(30);
        return view('stores',compact('user'));
    }
    public function single($name) {
        $tenent = tenantStor::where('name',$name)->first();
        $maintenant = Tenant::find($tenent->tenant_id);

        Tenants::switchTenant($maintenant);
        $visitor = Visitor::count();
        $deals = Deal::count();
        Tenants::switchLandlord();
        $user = User::find($tenent->user_id);
        return view('superSingle',compact('tenent','deals','visitor','user'));
    }

    public function delete(Request $request ,$id) {
        $tenant = Tenant::where('name',$id)->first();

        DB::statement('DROP DATABASE '.$tenant->db); 
        $tenant->delete();

        $tenentS = tenantStor::where('name',$id)->first();
        $tenentS->delete();
        return redirect()->route('super.index')->withInput()->with(
            'success', __('تم حذف المتجر!')
        );

    }
    public function loginStore(Request $request,$name){
        $tenantstore = tenantStor::where('name',$name)->first();
        $tenant = Tenant::find($tenantstore->tenant_id);

        $tenantID = Hash::make($tenant->domain);
        return redirect()->away('https://'. $tenant->domain.'/superLoginer?token='.$tenantID);
    }

    public function pay($id) {
        $tenents = PlanRequst::where('user_id',$id)->latest()->paginate(10);
        $user = User::find($id);
        $plans = Subscription::all();
        return view('superPay',compact('tenents','user','plans'));
    }

    public function subs(Request $request,$name){
        $user = User::findOrFail($name);
        $durt = 0;
        if (!$request->duration) {
            $durt = $request->hideduration;
        }else{
            $durt = $request->duration;
        }
        if ($user->type != $request->subscription) {
            $user->type = $request->subscription;
            $plan = Subscription::find($request->subscription);
            ChangeSubscribe($request->subscription,$user->id,0,$plan->price,$request->orders,date("Y-m-d", strtotime($durt)),$request->sarx);
        }else{
            $plan = Subscription::find($request->subscription);
             DontChangeSubscribe($request->subscription,$user->id,0,$plan->price,$request->orders,date("Y-m-d", strtotime($durt)),$request->store);
        }
        $user->orders = $request->store;
        $user->store = $request->orders;
        $user->duration =  date("Y-m-d", strtotime(datetime: $durt));
        $user->save();

        return Redirect::back();
    }

    public function aftt(Request $request,$name){
        $user = User::findOrFail($name);
        $user->admin = 1;
        $user->save();
        $aftt = new affiliateAdmin();
        $aftt->user = $user->id;
        $aftt->code = $request->aftt;
        $aftt->price = $request->price;
        $aftt->number1 = 0;
        $aftt->number2 = 0;
        $aftt->save();
        return Redirect::back();
    }

    private function last30DaysOrderChart($time)
    {

        $timeline = 30;



        $totalOrdersTimelineInString      = '';
        $totalOrdersAmountInString        = '';
        $totalOrdersAmount_delivered_s    = '';
        $totalOrdersAmount_new_s          = '';
        $totalOrdersAmount_cancelled_s    = '';
        $ordersQuery = Visitor::where('created_at', '>=', Carbon::now()->subDays($timeline))->oldest();

        for ($j = $timeline; $j >= 0; $j--) {
            $totalOrdersAmount = 0;
            $totalOrdersAmount_delivered = 0;
            $totalOrdersAmount_cancelled = 0;
            $totalOrdersAmount_new       = 0;

            foreach ($ordersQuery->get() as $order) {
                if (date('Y-m-d', strtotime($j . ' days ago')) == date('Y-m-d', strtotime($order->created_at))) {
                    $totalOrdersAmount += 1;
                }
            }

            if ($j == 0) {
                $totalOrdersTimelineInString .= json_encode(date('Y-m-d', strtotime($j . ' days ago')));
                $totalOrdersAmountInString .= json_encode($totalOrdersAmount);
            } else {
                $totalOrdersTimelineInString .= json_encode(date('Y-m-d', strtotime($j . ' days ago'))) . ',';
                $totalOrdersAmountInString .= json_encode($totalOrdersAmount) . ',';
            }
        }

        $totalOrdersData         = new SystemSetting; // to create temp instance.
        $totalOrdersData->labels =  $totalOrdersTimelineInString;
        $totalOrdersData->amount = $totalOrdersAmountInString;
        $totalOrdersData->totalOrders = $ordersQuery->count();

        return $totalOrdersData;
    }

}
