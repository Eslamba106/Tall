<?php 

namespace App\Services;

use App\Repo\CustomerRepo;


class CustomerService extends AbstractService
{
    protected $repo;
    public function __construct(CustomerRepo $repo){
        parent::__construct($repo);
        $this->repo = $repo;
    }
    
    public function store_customer($request)
    {
        return $this->repo->store_customer($request);
    }
    public function update_customer($id , $request)
    {
        return $this->repo->update_customer($id  , $request);
    }
    public function get_customer_list()
    {
        return $this->repo->getAll();
    }
    public function delete_customer($id)
    {
        return $this->repo->delete_customer($id);
    }
    public function get_customer($id)
    {
        return $this->repo->show($id);
    }
    
}