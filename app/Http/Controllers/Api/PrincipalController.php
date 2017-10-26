<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\PrincipalRepository;

class PrincipalController extends ApiController
{
  function __construct(PrincipalRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getPrincipals(){
      $obj =  $this->repository->published();
      return response()->json($obj,200);
    }
}
