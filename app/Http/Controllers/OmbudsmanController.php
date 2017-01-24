<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OmbudsmanRepository;

class OmbudsmanController extends Controller
{
  //
  protected $repository;

  function __construct(OmbudsmanRepository $repository)
  {
    $this->repository = $repository;
  }

  public function drafts()
  {
    $profiles = $this->repository->drafts();
    return view('administration.ombudsman.drafts')->with('profiles', $profiles);
  }

  public function published()
  {
    $profiles = $this->repository->published();
    return view('administration.ombudsman.published')->with('profiles', $profiles);
  }
}
