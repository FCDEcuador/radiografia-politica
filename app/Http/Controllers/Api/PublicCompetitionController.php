<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\PublicCompetitionRepository;

class PublicCompetitionController extends ApiController
{
  function __construct(PublicCompetitionRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getPublics(){
      $obj =  $this->repository->published();
      return response()->json($obj,200);
    }
}
