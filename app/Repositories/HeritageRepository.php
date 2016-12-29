<?php
namespace App\Repositories;

use App\Models\Heritage;

class HeritageRepository extends Repository
{
  function __construct(Heritage $model)
  {
    $this->model = $model;
  }


}
