<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\CitizenParticipationRepository;

class CitizenParticipationController extends ApiController
{
  function __construct(CitizenParticipationRepository $repository)
  {
    $this->repository = $repository;
  }
    public function getCitizens(){
      $obj =  $this->repository->published();
      return response()->json($obj,200);
    }
}
