<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PublicServantRepository;

class PublicServantController extends Controller
{
  //
  protected $repository;

  function __construct(PublicServantRepository $repository)
  {
    $this->repository = $repository;
  }

  public function drafts()
  {
    $profiles = $this->repository->drafts();
    return view('administration.public_servant.drafts')->with('profiles', $profiles);
  }

  public function published()
  {
    $profiles = $this->repository->published();
    return view('administration.public_servant.published')->with('profiles', $profiles);
  }
}
