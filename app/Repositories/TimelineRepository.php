<?php
namespace App\Repositories;

use App\Models\Timeline;

class TimelineRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
