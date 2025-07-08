<?php 

namespace App\Services;

use App\Repo\AdsRepo;


class AdsService extends AbstractService
{
    protected $repo;
    public function __construct(AdsRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
    
    public function store_ads($request)
    {
        return $this->repo->store_ads($request);
    }
    public function get_ads_list()
    {
        return $this->repo->getAll();
    }
}