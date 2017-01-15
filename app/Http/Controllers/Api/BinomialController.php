<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\BinomialRepository;

class BinomialController extends ApiController
{
  function __construct(BinomialRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getBinomials(){
      $obj =  $this->repository->getBinomials();
      return response()->json($obj,200);
    }
}
