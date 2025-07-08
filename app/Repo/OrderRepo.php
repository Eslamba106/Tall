<?php

namespace App\Repo;

use App\Models\MainOrder; 


class OrderRepo  extends AbstractRepo
{
    public function __construct()
    {
        parent::__construct(MainOrder::class);
    }

    public function delete_order($id)
    {
        $order = MainOrder::find($id);

        if ($order) { 
            $order->delete();
            return true;
        }
        return false;
    }
    public function store_order($request)
    {
 
        $order = new MainOrder();
        $order->customer_id = $request->customer_id;
        $order->ads_id = $request->ads_id;
        $order->notes = $request->notes;  
        $order->status = $request->status; // Assuming status is a field in the Order model
        $order->save();

        return $order;
    }
    public function update_order($id, $request)
    {
        $order = MainOrder::find($id);
        if ($order) {
            $order->customer_id = $request->customer_id ?? $order->customer_id;
            $order->ads_id = $request->ads_id ?? $order->ads_id;
            $order->notes = $request->notes ?? $order->notes;
            $order->status = $request->status ?? $order->status;  
            $order->save();
            return $order;
        }
        return false;
    }
    public function order_list()
    {
        return MainOrder::get();
    }
   
}
