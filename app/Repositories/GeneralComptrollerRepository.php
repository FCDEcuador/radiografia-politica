<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class GeneralComptrollerRepository extends ProfileRepository
{

  public function drafts($isCandidate = true)
  {
    return $this->model->whereHas('person', function ($query) use ($isCandidate){
      $query->where('state_id',State::draft())->where('is_candidate',$isCandidate)->whereHas('position', function($query){
        $query->where('name', "Contralor General del Estado");
      });
    })->with('person')->get();
  }

  public function published($isCandidate = true)
  {
    return $this->model->whereHas('person', function ($query) use ($isCandidate){
      $query->where('state_id',State::published())->where('is_candidate',$isCandidate)->whereHas('position', function($query){
        $query->where('name', "Contralor General del Estado");
      });
    })->with('person')->get();
  }
}
