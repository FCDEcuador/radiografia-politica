<?php
namespace App\Repositories;

use App\Models\Judicial;

class JudicialRepository extends Repository
{
  function __construct(Judicial $model)
  {
    $this->model = $model;
  }


}
