<?php 

namespace App\Services;

use App\Repo\OfferRepo;


class OfferService extends AbstractService
{
    protected $repo;
    public function __construct(OfferRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
    
    public function store_offer($request)
    {
        return $this->repo->store_offer($request);
    }
    public function update_offer($id , $request)
    {
        return $this->repo->update_offer($id  , $request);
    }
    public function get_offer_list()
    {
        return $this->repo->getAll();
    }
    public function delete_offer($id)
    {
        return $this->repo->delete_offer($id);
    }
    public function get_offer($id)
    {
        return $this->repo->show($id);
    }
    
}