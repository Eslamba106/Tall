<?php

namespace App\Repositories;

use App\Models\Subscription;
use App\Repositories\Interfaces\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function paginate(int $perPage = 10)
    {
        return Subscription::latest()->paginate($perPage);
    }

    public function find(int $id)
    {
        return Subscription::findOrFail($id);
    }
}
