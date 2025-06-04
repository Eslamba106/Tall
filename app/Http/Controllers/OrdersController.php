<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Estate;
use App\Models\Customer;
use App\Models\requestd;
use App\Models\EstateComb;
use App\Models\EstateProps;
use App\Models\OrderGroupe;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $estates = Order::latest()->paginate(10);
        return view('orders.index',compact('estates'));
        }
        public function requests(){
            $estates = requestd::latest()->paginate(10);
            return view('orders.request',compact('estates'));
            }
        public function requestsedit(Request $request,$id){
            $order =  requestd::findOrFail($id);
            //  $estateProps = EstateProps::whereIn('id',$order->id)->get();
            return view('orders.resuqtedit',compact('order'));
        }
        public function edit(Request $request,$id){
            $order =  Order::findOrFail($id);
            $customer = Customer::find($order->user);
            $estatess =  Estate::findOrFail($order->estate);
            $status =  OrderStatus::where('order',$order->id)->latest()->get();
            $estateCombs = EstateComb::where('type',$order->estate)->pluck('props')->all();
          //  $estateProps = EstateProps::whereIn('id',$order->id)->get();
            $dealProps = OrderGroupe::where('order',$order->id)->get();
            return view('orders.edit',compact('order','estatess','customer','status','dealProps'));
        }
        public function upgrade(Request $request,$id){
            $deal =  Order::findOrFail($id);
            $customer =  Customer::findOrFail($request->customerid);
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
            $deal->note = $request->note;
            $deal->save();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->save();
    
    
            foreach ($request->props as $key => $prop) {
                $estate_groupe = OrderGroupe::updateOrCreate([
                    'order'=> $deal->id,
                    'props' => $request->ids[$key],
                    'name'  => $request->names[$key],
                ],[
                    'value' => $prop,
                ]);
            }
    
            $settings = OrderStatus::create([
                'order' => $request->id,
                'title' => 'تحديث الصفقة',
                'content' => $content,
            ]);
            $settings->save();
        }

        public function update(Request $request){
            $deal =  Order::findOrFail($request->id);
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
            $settings = OrderStatus::create([
                'order' => $request->id,
                'title' => ' تغيير حالة الصفقة',
                'content' => $content,
            ]);
            $settings->save();
            return true;
        }
}
