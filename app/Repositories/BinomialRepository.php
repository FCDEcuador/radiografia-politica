<?php
namespace App\Repositories;

use App\Models\PoliticalParty;
use UmpactoSoluciones\Tools\Exceptions\ApiException;
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
      $item['president'] = $partido->president();
      $item['vicepresident'] = $partido->vicepresident();
      $item['partido'] = $partido;

      if(!($partido->president()->first() instanceof PoliticalParty) && !($partido->vicepresident()->first() instanceof  PoliticalParty)){
        array_push($response,$item);
      }
    };
    return $response;
  }
}
