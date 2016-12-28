<?php
namespace App\Repositories;

use App\Models\Judicial;

class JudicialRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
