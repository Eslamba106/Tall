<?php

namespace App\Repositories;

use App\Models\TenantStor;

class TenantStorRepository
{
    public function find(int $id)
    {
        return TenantStor::findOrFail($id);
    }

    public function findByName(string $name)
    {
        return TenantStor::where('name', $name)->first();
    }
}
