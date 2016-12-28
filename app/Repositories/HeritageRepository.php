<?php
namespace App\Repositories;

use App\Models\Heritage;

class HeritageRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
