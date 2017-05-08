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
        $query->where('name', "Defensor del Pueblo")->orWhere('name','Defensores Provinciales')->orWhere('name','Presidente del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Vicepresidente del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Consejeros del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Contralor General del Estado')->orWhere('name','Superintendentes');
        });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Defensor del Pueblo")->orWhere('name','Defensores Provinciales')->orWhere('name','Presidente del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Vicepresidente del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Consejeros del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Contralor General del Estado')->orWhere('name','Superintendentes');
        });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }
}
