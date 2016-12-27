<?php
namespace App\Repositories;

use App\Models\Comptroller;

class ComptrollerRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
