<?php
namespace App\Repositories;

use App\Models\SRI;

class SRIRepository extends Repository
{
  function __construct(SRI $model)
  {
    $this->model = $model;
  }


}
