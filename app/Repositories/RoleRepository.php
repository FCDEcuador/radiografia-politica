<?php
namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
