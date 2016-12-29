<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PresidencialCandidatesRepository;

class PresidencialCandidatesController extends Controller
{
    //
    protected $repository;

    function __construct(PresidencialCandidatesRepository $repository)
    {
      $this->repository = $repository;
    }

    public function drafts()
    {
      $profiles = $this->repository->drafts();
      return view('administration.presidencial_candidates.drafts')->with('profiles', $profiles);
    }

    public function published()
    {
      $profiles = $this->repository->published();
      return view('administration.presidencial_candidates.published')->with('profiles', $profiles);
    }
}
