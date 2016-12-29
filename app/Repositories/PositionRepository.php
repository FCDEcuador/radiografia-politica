<?php
namespace App\Repositories;

use App\Models\Position;

class PositionRepository extends Repository
{
  function __construct(Position $model)
  {
    $this->model = $model;
  }


}
