<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Customer;
use App\Models\MainOrder;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{
    public $order;
    public $model;

    public function __construct(OrderService $order)
    {
        $this->order = $order;
    }
    public function create()
    {
        $customers = Customer::select('id', 'name')->get();
        $ads = Ads::select('id', 'name')->get(); // Assuming you have an Ads model to fetch ads
        $data = [
            'customers' => $customers,
            'ads' => $ads, // Pass ads to the view
        ];
        return view('dash.orders.create', $data); // Assuming you have a view for creating orders
    }

    public function store(Request $request)
    {
        
        if ( !is_null($request->customer_name) && !is_null($request->customer_phone)) {
            // dd($request->all());

            $customer = Customer::create([
                'name' => $request->customer_name,
                'phone' => $request->customer_phone,
                'email' => $request->customer_email,
                'note' => $request->customer_note,
                'city' => $request->customer_city,
                'district' => $request->customer_district,
            ]);
        } 
        $data = (object) [
            'customer_id' => $request->customer_id ?? $customer->id,
            'ads_id' => $request->ads_id,
            'notes' => $request->note,
            'status' => $request->status ?? null,
        ];
        // $data = [
        //     'customer_id' => $request->customer_id ?? $customer->id,
        //     'ads_id' => $request->ads_id, 
        //     'note' => $request->note,
        // ];
        $main_order = $this->order->store_order($data);
        if (!$main_order) {
            return response()->apiFail('Failed to add Order', 500);
        }
        return redirect()->route('order.list')->with('success', 'Order added successfully');
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
        return response()->apiSuccess('Order retrieved successfully', $order);
    }

    public function list(Request $request)
    {
       // $list = $this->order->get_order_list();
           $ids = $request->bulk_ids;
        if ($request->bulk_action_btn === 'update_status' && is_array($ids) && count($ids)) {
            $data = ['status' => 1];
            (new MainOrder())->setConnection('tenant')->whereIn('id', $ids)->update($data);
            return back()->with('success', __('general.updated_successfully'));
        }
        $search      = $request['search'];
        $query_param = $search ? ['search' => $request['search']] : '';
        $orders     = (new MainOrder())->setConnection('tenant')->when($request['search'], function ($q) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $q->Where('name', 'like', "%{$value}%")
                    ->orWhere('id', $value);
            }
        })
            ->latest()->paginate()->appends($query_param);

        $data = [
            'orders' => $orders,
            'search'  => $search,

        ];
        return view("dash.orders.list", $data);
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
