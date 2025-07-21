<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customers;

    public function __construct(CustomerRepository $customers)
    {
        $this->customers = $customers;
    }

    public function index()
    {
        $data = $this->customers->getAll();
        return response()->apiSuccess($data, 'Customers retrieved successfully');
    }

    public function create()
    {
        return response()->apiSuccess([], 'Form data retrieved');
    }

    public function edit($id)
    {
        $customer = $this->customers->find($id);
        if (!$customer) {
            return response()->apiFail('Customer not found', 404);
        }
        return response()->apiSuccess($customer, 'Customer data retrieved');
    }


	 public function list()
    {
        $customers = $this->customers->getAll();
        return response()->apiSuccess($customers, 'Customer list retrieved successfully');
    }



    public function store(Request $request)
    {
        $data = $request->only(['user', 'phone', 'note', 'type']);
        $customer = $this->customers->create([
            'name' => $data['user'],
            'phone' => $data['phone'],
            'note' => $data['note'],
            'type' => $data['type'],
        ]);
        return response()->apiSuccess($customer, 'Customer created successfully');
    }







    public function update(Request $request)
    {
        $customer = $this->customers->find($request->id);
        if (!$customer) {
            return response()->apiFail('Customer not found', 404);
        }

        $this->customers->update($customer, [
            'name' => $request->user,
            'phone' => $request->phone,
            'note' => $request->note,
            'type' => $request->type,
        ]);

        return response()->apiSuccess($customer, 'Customer updated successfully');
    }
}
