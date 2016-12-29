<?php
namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends Repository
{
  function __construct(Company $model)
  {
    $this->model = $model;
  }


}
