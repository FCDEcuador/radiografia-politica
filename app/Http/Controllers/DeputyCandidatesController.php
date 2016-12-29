<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DeputyRepository;

class DeputyCandidatesController extends Controller
{
  //
  protected $repository;

  function __construct(DeputyRepository $repository)
  {
    $this->repository = $repository;
  }

  public function drafts()
  {
    $profiles = $this->repository->drafts($isCandidate=true);
    return view('administration.asambleistas_candidates.drafts')->with('profiles', $profiles);
  }

  public function published()
  {
    $profiles = $this->repository->published($isCandidate=true);
    return view('administration.asambleistas_candidates.published')->with('profiles', $profiles);
  }
}
