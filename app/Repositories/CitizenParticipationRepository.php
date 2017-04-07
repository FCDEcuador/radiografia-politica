<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class CitizenParticipationRepository extends ProfileRepository
{

  public function drafts()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::draft())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Defensor del Pueblo");
        });
    })->select('profiles.*')->with('person')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Defensor del Pueblo");
      });
    })->select('profiles.*')->with('person')->orderBy('p.lastname')->get();
  }
}
