<?php
namespace App\Repositories;

use App\Models\Timeline;

class TimelineRepository extends Repository
{
  function __construct(Timeline $model)
  {
    $this->model = $model;
  }


}
