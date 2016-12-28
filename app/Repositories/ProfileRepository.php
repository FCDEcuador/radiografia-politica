<?php
namespace App\Repositories;

use App\Models\Profile;

class ProfileRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
