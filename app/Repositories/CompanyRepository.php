<?php
namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
