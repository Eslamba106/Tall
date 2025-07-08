<?php

namespace App\Repo;

use App\Models\Ads;


class AdsRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Ads::class);
    }
     
}