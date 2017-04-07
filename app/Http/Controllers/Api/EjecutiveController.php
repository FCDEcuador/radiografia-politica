<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\EjecutiveRepository;

class EjecutiveController extends ApiController
{
  function __construct(EjecutiveRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getEjecutives(){
      $obj =  $this->repository->published();
      return response()->json($obj,200);
    }
}
