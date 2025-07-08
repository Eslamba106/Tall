<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
        public $customer;
    public $model;
    public function __construct(CustomerService $customer)
    {
        $this->customer = $customer; 

    }
        public function store(Request $request)
    {

        $main_customer = $this->customer->store_customer($request);
        if (!$main_customer) {
            return response()->apiFail('Failed to add Customer', 500);
        }
        return response()->apiSuccess('Customer added successfully', $main_customer);
    }
    public function update(Request $request, $id)
    {
        $customer = $this->customer->update_customer($id, $request);
        if (!$customer) {
            return response()->apiFail('Customer not found', 404);
        }
        return response()->apiSuccess('Customer updated successfully', $customer);
    }
    public function get_customer($id)
    {
        $customer = $this->customer->get_customer($id);
        if (!$customer) {
            return response()->apiFail('Customer not found', 404);
        }
        return response()->apiSuccess('Customer updated successfully', $customer);
    }
    public function list(Request $request)
    {
        // return("user" .auth('sanctum')->check());

        $list = $this->customer->get_customer_list();
        return response()->apiSuccess('Customer List ', $list);
    }
    public function delete($id)
    {
        $customer = $this->customer->delete_customer($id);
        if (!$customer) {
            return response()->apiFail('Customer not found', 404);
        }
        return response()->apiSuccess('Customer deleted successfully', $customer);
    }

}
