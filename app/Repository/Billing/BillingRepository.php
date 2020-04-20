<?php
 

namespace App\Repository\Billing;   

use App\Repository\BillingRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;
use App\Billing;   

class BillingRepository implements BillingRepositoryInterface 
{     
       
     protected $model;       
   
    public function __construct()     
    {         
        $this->model = new Billing();
    }


    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

  
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function getAll(){
        return $this->model->all();
    }

    public function findByColumn(array $params){
        return $this->model->where($params)->get();
    }
}