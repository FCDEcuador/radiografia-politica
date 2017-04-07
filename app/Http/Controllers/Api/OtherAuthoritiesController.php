<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\OtherAuthoritiesRepository;

class OtherAuthoritiesController extends ApiController
{
  function __construct(OtherAuthoritiesRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getOthers(){
      $obj =  $this->repository->published();
      return response()->json($obj,200);
    }
}
