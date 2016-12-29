<?php
namespace App\Repositories;

use App\Models\State;

class StateRepository extends Repository
{
  function __construct(State $model)
  {
    $this->model = $model;
  }


}
