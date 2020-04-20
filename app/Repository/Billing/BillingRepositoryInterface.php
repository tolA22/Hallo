<?php
namespace App\Repository\Billing;


use Illuminate\Database\Eloquent\Model;


interface BillingRepositoryInterface
{

   public function create(array $attributes);
   public function find($id);
   public function getAll();
   public function update(array $params,array $conditions);
   public function findByColumn(array $params);
}