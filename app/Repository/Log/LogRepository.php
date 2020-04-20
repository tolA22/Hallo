<?php
 

namespace App\Repository\Log;   

use App\Repository\LogRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;
use App\Log;   

class LogRepository implements LogRepositoryInterface 
{     
       
     protected $model;       
   
    public function __construct()     
    {         
        $this->model = new Log();
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