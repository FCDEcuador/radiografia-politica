<?php
namespace App\Repositories;

use App\Models\Study;

class StudyRepository extends Repository
{
  function __construct(Study $model)
  {
    $this->model = $model;
  }


}
