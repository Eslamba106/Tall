<?php

namespace App\Repo;

use App\Models\Customer;
use App\Http\Helpers\ImageManager;


class CustomerRepo  extends AbstractRepo
{
    public function __construct()
    {
        parent::__construct(Customer::class);
    }

    public function delete_customer($id)
    {
        $customer = Customer::find($id);

        if ($customer) { 
            $customer->delete();
            return true;
        }
        return false;
    }
    public function store_customer($request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->note = $request->note;
        $customer->type = $request->type; 
        $customer->save();

        return $customer;
    }
    public function update_customer($id, $request)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->note = $request->note;
            $customer->type = $request->type; 
            $customer->save();
            return $customer;
        }
        return false;
    }
    public function customer_list()
    {
        return Customer::get();
    }
   
}
