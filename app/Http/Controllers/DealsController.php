<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use App\Models\Estate;
use App\Models\Customer;
use App\Models\DealGroupe;
use App\Models\DealStatus;
use App\Models\EstateComb;
use App\Models\EstateType;
use App\Models\EstateProps;
use App\Models\EstateGroupe;
use Illuminate\Http\Request;
use App\Models\singleSubscription;

class DealsController extends Controller
{
    public function index(Request $request){
        $searchKey = null;
        $searchCode = null;
        $status = null;
        $estates = Deal::latest();
        if ($request->search != null) {
            $searchKey = $request->search;
            $estates = $estates->where(function ($q) use ($searchKey) {
                $customer = Customer::where('name', 'like', '%' . $searchKey . '%')
                ->orWhere('phone', 'like', '%' . $searchKey . '%')
                ->pluck('id');    
                $q->orWhereIn('user', $customer);
            });
        }
        $estates0 = Deal::count();
        $estates1 = Deal::where('status', 1)->count();
        $estates3 = Deal::where('status', 3)->count();
        $estates4 = Deal::where('status', 4)->count();
        $estates5 = Deal::where('status', 5)->count();

        $deals = $estates->paginate(10);
        return view('deals.index',compact('deals','estates0','estates1','estates3','estates4','estates5','searchKey'));
    }
    public function change(Request $request){
        if ($request->status == 0) {
            $estates = Deal::latest();
        }else{
            $estates = Deal::where('status',$request->status)->latest();
        }
        if ($request->search != null) {
            $searchKey = $request->search;
            $estates = $estates->where(function ($q) use ($searchKey) {
                $customer = Customer::where('name', 'like', '%' . $searchKey . '%')
                ->orWhere('phone', 'like', '%' . $searchKey . '%')
                ->pluck('id');    
                $q->orWhereIn('user', $customer);
            });
        }
        $rannd = rand(1,50);
        $dealscount = $estates->count();
        $deals = $estates->paginate(10);
        return ['number' =>$dealscount,
            'data' =>view('deals.indexChange',compact('deals','rannd'))->render()
        ];
    }
    public function create(){
        $types = EstateType::latest()->get();
        $customers = Customer::latest()->get();
        return view('deals.create',compact('types','customers'));
    }
    public function store(Request $request){
        

        $subsUser = auth()->user();
        $subscription  = singleSubscription::find($subsUser->subscription);
        if ($subscription && $subscription->id != 3 && $subscription->orders <= $subsUser->subscriptionOrders){
            $msg['flag'] = 'error';
            $msg['msg']  = 'يجب تجديد الاشتراك';
            return $msg;
        }
        $subsUser->subscriptionOrders = $subsUser->subscriptionOrders+1;
        $subsUser->save();

        $estate             = new Deal();
        $estate->state      = 1;
        $estate->type       = $request->type;
        $estate->goal       = $request->goal;
        $estate->estate     = $request->estate;
        if ($request->newcustomer != '' && $request->newnumber != '') {
        $customer           = new Customer();
        $customer->name     = $request->newcustomer;
        $customer->phone    = $request->newnumber;
        $customer->save();
        $estate->user       = $customer->id;
        }else{
            $estate->user   = $request->user;
        }
        $estate->save();
        return ['status'=>true,'id'=> $estate->id];
    }
    public function edit(Request $request,$id){
        $estate =  Deal::findOrFail($id);
        $theme = getSetting('theme');
        $estatemain = '';
        $customer = Customer::find($estate->user);
        $theme = getSetting('theme');
        $estates =  Estate::latest()->get();
        $status =  DealStatus::where('deal',$estate->id)->latest()->get();
        $estateCombs = EstateComb::where('type',$estate->estate)->pluck('props')->all();
        if ($theme == 'theme2') {
            $estateProps = EstateProps::first();
        }else{
            $estateProps = EstateProps::whereIn('id',$estateCombs)->get();
        }
        if ($theme == 'theme1') {
            $types = EstateType::find($estate->estate);
        }else{
            $types = '';
        }
        $dealProps = DealGroupe::where('deal',$estate->id)->get();
        return view('deals.edit',compact('estate','customer','estatemain','status','estates','estateProps','dealProps','types'));
    }
    public function update(Request $request){
        $deal =  Deal::findOrFail($request->id);
        $deal->status = $request->status;
        $deal->save();
        $content = 'صفقة جديدة';
        if ($request->status == 2) {
            $content = 'زيارة العقار';
        }elseif ($request->status == 3) {
            $content = 'المفاوضات';
        }elseif ($request->status == 4) {
            $content = 'تمت الصفقة';
        }elseif ($request->status == 5) {
            $content = 'خسارة الصفقة';
        }
        $settings = DealStatus::create([
            'deal' => $request->id,
            'title' => ' تغيير حالة الصفقة',
            'content' => $content,
        ]);
        $settings->save();
        return true;
    }
    public function upgrade(Request $request,$id){
        $deal =  Deal::findOrFail($id);
        $customer =  Customer::findOrFail($request->customerid);
        $theme = getSetting('theme');

        $content = '';
        if ($deal->price != $request->price) {
            $content = 'تغيير سعر الصفقة'.$content;
        }elseif ($deal->notes != $request->note) {
            $content = 'تغيير الملاحظات'.$content;
        }elseif ($customer->phone != $request->phone) {
            $content = 'تغيير رقم الهاتف'.$content;
        }elseif ($deal->city = $request->city) {
            $content = 'تغيير المدينة'.$content;
        }elseif ($customer->name != $request->name) {
            $content = 'تغيير اسم المستخدم'.$content;
        }else{
            $content = 'تحديث للخواص الثانوية';
        }
        $deal->price = $request->price;
        $deal->notes = $request->note;
        $deal->city = $request->city;
        $deal->estates = $request->multiple_estates;
        $deal->state = $request->state;
        $deal->save();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->save();

        if ($theme == 'theme1') {
        foreach ($request->props as $key => $prop) {
            $estate_groupe = DealGroupe::updateOrCreate([
                'deal'=> $deal->id,
                'props' => $request->ids[$key],
                'name'  => $request->names[$key],
            ],[
                'value' => $prop,
            ]);
        }
        }

        $settings = DealStatus::create([
            'deal' => $request->id,
            'title' => 'تحديث الصفقة',
            'content' => $content,
        ]);
        $settings->save();
        return ['flag' => 'success']; 
    }
}
