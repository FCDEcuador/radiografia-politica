<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\GeneralComptrollerRepository;

class GeneralComptrollerController extends ApiController
{

  function __construct(GeneralComptrollerRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getGeneralComptroller(){
      $obj =  $this->repository->drafts();
      return response()->json($obj,200);
    }
}
