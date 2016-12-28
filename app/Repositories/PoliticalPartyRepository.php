<?php
namespace App\Repositories;

use App\Models\PoliticalParty;

class PoliticalPartyRepository extends Repository
{
  function __construct(Comptroller $model)
  {
    $this->model = $model;
  }


}
