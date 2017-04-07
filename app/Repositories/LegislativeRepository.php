<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class LegislativeRepository extends ProfileRepository
{

  public function drafts()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::draft())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Asambleísta");
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Asambleísta");
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }
}
