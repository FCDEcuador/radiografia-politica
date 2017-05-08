<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class OtherAuthoritiesRepository extends ProfileRepository
{

  public function drafts()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::draft())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Procurador General del Estado")->orWhere('name','Subprocurador General del Estado')->orWhere('name','Presidente de la Corte Constitucional')->orWhere('name','Jueces de la Corte Constitucional');
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Procurador General del Estado")->orWhere('name','Subprocurador General del Estado')->orWhere('name','Presidente de la Corte Constitucional')->orWhere('name','Jueces de la Corte Constitucional');
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }
}
