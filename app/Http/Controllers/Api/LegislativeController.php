<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\LegislativeRepository;

class LegislativeController extends ApiController
{
  function __construct(LegislativeRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getLegislatives(){
      $obj =  $this->repository->published();
      return response()->json($obj,200);
    }
}
