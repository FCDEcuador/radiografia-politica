<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\DeputyRepository;

class DeputyController extends ApiController
{
  function __construct(DeputyRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getDeputys($isCandidate){
      $obj =  $this->repository->published((bool)$isCandidate);
      return response()->json($obj,200);
    }
}
