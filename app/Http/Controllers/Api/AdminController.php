<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\AdminRepository;

class AdminController extends ApiController
{
  function __construct(AdminRepository $repository)
  {
    $this->repository = $repository;
  }
    public function dashboard(){
        return response()->json($this->repository->dashboard(),200);
    }
}
