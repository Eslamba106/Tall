<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public $order;
    public $model;
    public function __construct(OrderService $order)
    {
        $this->order = $order;
    }
    public function store(Request $request)
    {

        $main_order = $this->order->store_order($request);
        if (!$main_order) {
            return response()->apiFail('Failed to add Order', 500);
        }
        return response()->apiSuccess('Order added successfully', $main_order);
    }
    public function update(Request $request, $id)
    {
        $order = $this->order->update_order($id, $request);
        if (!$order) {
            return response()->apiFail('Order not found', 404);
        }
        return response()->apiSuccess('Order updated successfully', $order);
    }
    public function get_order($id)
    {
        $order = $this->order->get_order($id);
        if (!$order) {
            return response()->apiFail('Order not found', 404);
        }
        return response()->apiSuccess('Order updated successfully', $order);
    }
    public function list(Request $request)
    {
        // return("user" .auth('sanctum')->check());

        $list = $this->order->get_order_list();
        return response()->apiSuccess('Order List ', $list);
    }
    public function delete($id)
    {
        $order = $this->order->delete_order($id);
        if (!$order) {
            return response()->apiFail('Order not found', 404);
        }
        return response()->apiSuccess('Order deleted successfully', $order);
    }
}
