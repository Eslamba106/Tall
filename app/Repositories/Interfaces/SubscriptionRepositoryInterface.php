<?php

namespace App\Repositories\Interfaces;

namespace App\Repositories\Interfaces;

interface SubscriptionRepositoryInterface
{
    public function paginate(int $perPage = 10);
    public function find(int $id);
}

