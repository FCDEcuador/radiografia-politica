<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\OmbudsmanRepository;

class OmbudsmanController extends ApiController
{
  function __construct(OmbudsmanRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getOmbudsman(){
      $obj =  $this->repository->drafts();
      return response()->json($obj,200);
    }
}
