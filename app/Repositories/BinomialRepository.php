<?php
namespace App\Repositories;

use App\Models\PoliticalParty;
use App\Exceptions\ApiResponseException;
use Auth;

class BinomialRepository extends Repository
{
  function __construct(PoliticalParty $model)
  {
    $this->model = $model;
  }

  function getBinomials(){
    $response = [];
    foreach ($this->all() as $partido) {
      $item['partido'] = $partido;
      $item['president'] = $partido->president();
      $item['vice_president'] = $partido->vicePresident();
      array_push($response,$item);
    };
    return $response;
  }
}
