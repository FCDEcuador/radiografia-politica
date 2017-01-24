<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class OmbudsmanRepository extends ProfileRepository
{

  public function drafts($isCandidate = true)
  {
    return $this->model->whereHas('person', function ($query) use ($isCandidate){
      $query->where('state_id',State::draft())->where('is_candidate',$isCandidate)->whereHas('position', function($query){
        $query->where('name', "Defensor del Pueblo");
      });
    })->with('person')->get();
  }

  public function published($isCandidate = true)
  {
    return $this->model->whereHas('person', function ($query) use ($isCandidate){
      $query->where('state_id',State::published())->where('is_candidate',$isCandidate)->whereHas('position', function($query){
        $query->where('name', "Defensor del Pueblo");
      });
    })->with('person')->get();
  }
}
