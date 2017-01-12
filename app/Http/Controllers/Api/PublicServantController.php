<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\PublicServantRepository;

class PublicServantController extends ApiController
{
  function __construct(PublicServantRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getPublicServants(){
      $obj =  $this->repository->published(true);
      return response()->json($obj,200);
    }
}
