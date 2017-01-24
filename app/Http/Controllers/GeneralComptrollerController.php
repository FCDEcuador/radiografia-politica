<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GeneralComptrollerRepository;

class GeneralComptrollerController extends Controller
{
  //
  protected $repository;

  function __construct(GeneralComptrollerRepository $repository)
  {
    $this->repository = $repository;
  }

  public function drafts()
  {
    $profiles = $this->repository->drafts();
    return view('administration.general_comptroller.drafts')->with('profiles', $profiles);
  }

  public function published()
  {
    $profiles = $this->repository->published();
    return view('administration.general_comptroller.published')->with('profiles', $profiles);
  }
}
