<?php
namespace App\Repositories;

use App\Models\JudgmentType;

class judgment_typeRepository extends Repository
{
  function __construct(JudgmentType $model)
  {
    $this->model = $model;
  }


}
