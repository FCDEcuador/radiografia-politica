<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\JudicialRepository;

class JudicialController extends ApiController
{
  function __construct(JudicialRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getJudicials(){
      $obj =  $this->repository->published();
      return response()->json($obj,200);
    }
}
