<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function getAll($perPage = 10)
    {
        return Customer::latest()->paginate($perPage);
    }

    public function find($id)
    {
        return Customer::find($id);
    }

    public function findOrFail($id)
    {
        return Customer::findOrFail($id);
    }

    public function create(array $data)
    {
        return Customer::create($data);
    }

    public function update(Customer $customer, array $data)
    {
        $customer->update($data);
        return $customer;
    }
}
