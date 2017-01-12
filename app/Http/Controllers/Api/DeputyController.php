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
    public function getDeputys(){
      $obj =  $this->repository->published(true);
      return response()->json($obj,200);
    }
}
