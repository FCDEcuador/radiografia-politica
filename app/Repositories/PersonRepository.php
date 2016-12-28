<?php
namespace App\Repositories;

use App\Models\Person;

class PersonRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
