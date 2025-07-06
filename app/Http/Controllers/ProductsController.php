<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Order;
use App\Models\Estate;
use App\Models\Customer;
use App\Models\requestd;
use App\Models\EstateComb;
use App\Models\EstateType;
use App\Models\EstateProps;
use App\Models\OrderGroupe;
use App\Models\EstateGroupe;
use Illuminate\Http\Request;
use App\Models\singleSubscription;

class ProductsController extends Controller
{
    public function requests() {
        $types = EstateType::latest()->get();

        return get_theme_view('customDeal', compact('types'));

    }

    public function requestStore(Request $request) {
        $requestd =new requestd;
        $requestd->type = $request->type;
        $requestd->goal = $request->goal;
        $requestd->estate = $request->estate;
        $requestd->username = $request->name;
        $requestd->phone = $request->phone;
        $requestd->notes = $request->notes;
        $requestd->city = $request->city;
        $requestd->state = $request->state;
        $requestd->save();
        return redirect()->back()->with('success', __('تم الطلب بنجاح!'));
    }
    public function index(Request $request,$slug) {
        $estate = Estate::findOrFail($slug);
        $related = Estate::where('id','!=',$slug)->where('estate',$estate->estate)->limit(3)->get();
        $props = EstateGroupe::where('estate',$estate->id)->get();
        // if ($estate->status == 0) {
        //     abort(404);
        //  }
        VisitorCounter($request,$slug);
        return getView('single', ['estate' => $estate, 'props' => $props,'related' =>$related]);

    }

    public function search(Request $request) {

        $estateType = EstateType::latest()->where('active',1)->get();
        $estateModel = null;
        $types = null;
        if (getSetting('theme') == 'theme2') {
        $types = Estate::distinct()->pluck('type');
        $estateModel = Estate::distinct()->pluck('model');
        }

        $estateAll = Estate::where('status',1)->count();
        $estateSell = Estate::where('status',1)->where('goal','بيع')->count();
        $estateRent = Estate::where('status',1)->where('goal','ايجار')->count();
        $estatStatet = Estate::where('status',1)->pluck('state');

        VisitorCounter($request,0);
        return getView('search', compact('estateType','estateAll','estateSell','estateRent','estatStatet','estateModel','types'));

    }
    public function estateSubmit(Request $request,$slug) {
        $estate = Estate::findOrFail($slug);
        return getView('singleForm', ['estate' => $estate]);
    }
    public function store(Request $request,$slug) {
        $estate = Estate::findOrFail($slug);
        $theme = getSetting('theme');

        if ($estate->status == 0) {
            abort(404);
         }

         $subsUser = auth()->user();
         $subscription  = singleSubscription::find($subsUser->subscription);
         if ($subscription && $subscription->id != 3 && $subscription->orders <= $subsUser->subscriptionOrders){
             return redirect()->back()->with('error', __('لا يمكن الطلب الأن!'));
            }
         $subsUser->subscriptionOrders = $subsUser->subscriptionOrders+1;
         $subsUser->save();

        $customer = Customer::firstOrCreate(['phone' => $request->phone]);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->save();

        $order = new Deal;
        if ($theme == 'theme2') {
            $order->estate = $estate->estatetxt;
            $order->goal = $estate->model;
        }else{
            $order->estate = $estate->id;
            $order->goal = $estate->goal;
        }
       // $order->name = $request->name;
        $order->user = $customer->id;
        //$order->phone = $request->phone;
        $order->type = $estate->type;
        $order->estates = '["'.$estate->id.'"]';
        //$order->type = $estate->type;
        $order->price = $estate->price;
        $order->status = 1;
        $order->save();

        $estateGroupe = EstateGroupe::where('estate',$estate->id)->get();
        foreach ($estateGroupe as $key => $estateGp) {
            $orderGroupe = new OrderGroupe;
            $orderGroupe->order = $order->id;
            $orderGroupe->props = $estateGp->props;
            $orderGroupe->name = $estateGp->name;
            $orderGroupe->value = $estateGp->value;
            $orderGroupe->save();
        }


        return redirect()->route('products',$estate->id)->with('success', __('تم الطلب بنجاح!'));
    }
}
