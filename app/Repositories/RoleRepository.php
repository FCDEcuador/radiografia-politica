<?php
namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends Repository
{
  function __construct(Role $model)
  {
    $this->model = $model;
  }


}
