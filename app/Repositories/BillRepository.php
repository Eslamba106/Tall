<?php


namespace App\Repositories;

use App\Models\Bill;

class BillRepository
{
    public function paginate(int $perPage = 10)
    {
        return Bill::latest()->paginate($perPage);
    }

    public function create(array $data)
    {
        return Bill::create($data);
    }
}
