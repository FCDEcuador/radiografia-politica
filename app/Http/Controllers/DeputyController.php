<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DeputyRepository;

class DeputyController extends Controller
{
  //
  protected $repository;

  function __construct(DeputyRepository $repository)
  {
    $this->repository = $repository;
  }

  public function drafts()
  {
    $profiles = $this->repository->drafts();
    return view('administration.asambleistas.drafts')->with('profiles', $profiles);
  }

  public function published()
  {
    $profiles = $this->repository->published();
    return view('administration.asambleistas.published')->with('profiles', $profiles);
  }
}
