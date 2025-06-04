<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::latest()->paginate(10);
        return view('customers.index',compact('customers'));
    }
    public function create(){
        return view('customers.create');
    }
    public function edit($id){
        $customer             =  Customer::findOrFail($id);

        return view('customers.edit',compact('customer'));
    }
    public function store(Request $request){
        $customer             = new Customer();
        $customer->name       = $request->user;
        $customer->phone       = $request->phone;
        $customer->note       = $request->note;
        $customer->type     = $request->type;
        $customer->save();
        return redirect()->route('customers.index')->with('success', __('تمت اضافة العميل!'));

    }
    public function update(Request $request){
        $customer             =  Customer::findOrFail($request->id);
        $customer->name       = $request->user;
        $customer->phone       = $request->phone;
        $customer->note       = $request->note;
        $customer->type     = $request->type;
        $customer->save();
        return redirect()->route('customers.index')->with('success', __('تم تحديث معلومات العميل!'));

    }
}
