<?php 

namespace App\Services;

use App\Repo\OrderRepo;


class OrderService extends AbstractService
{
    protected $repo;
    public function __construct(OrderRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
    
    public function store_order($request)
    {
        return $this->repo->store_order($request);
    }
    public function update_order($id , $request)
    {
        return $this->repo->update_order($id  , $request);
    }
    public function get_order_list()
    {
        return $this->repo->getAll();
    }
    public function delete_order($id)
    {
        return $this->repo->delete_order($id);
    }
    public function get_order($id)
    {
        return $this->repo->show($id);
    }
    
}