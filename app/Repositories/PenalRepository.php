<?php
namespace App\Repositories;

use App\Models\Penal;

class PenalRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
