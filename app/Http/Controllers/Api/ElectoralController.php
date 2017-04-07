<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\ElectoralRepository;

class ElectoralController extends ApiController
{
  function __construct(ElectoralRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getElectorals(){
      $obj =  $this->repository->published();
      return response()->json($obj,200);
    }
}
