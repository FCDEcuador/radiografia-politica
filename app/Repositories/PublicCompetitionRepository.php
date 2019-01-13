<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class PublicCompetitionRepository extends ProfileRepository
{

  public function drafts()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::draft())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "=","Postulante a Juez (a) de la Corte Nacional de Justicia")
        ->orWhere('name', "=","Postulante al Consejo de Participación Ciudadana y Control Social")
        ->orWhere('name', "=","Postulante a Procurador General del Estado")
        ->orWhere('name', "=","Postulante a Superintendente de control de Poder de Mercado")
        ->orWhere('name', "=","Postulante a Superintendente de Control del Poder de Mercado")
        ->orWhere('name', "=","Postulante a Superintendente de Comunicación");
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
          $query->where('name', "=","Postulante a Juez (a) de la Corte Nacional de Justicia")
          ->orWhere('name', "=","Postulante al Consejo de Participación Ciudadana y Control Social")
          ->orWhere('name', "=","Postulante a Procurador General del Estado")
          ->orWhere('name', "=","Postulante a Superintendente de control de Poder de Mercado")
          ->orWhere('name', "=","Postulante a Superintendente de Control del Poder de Mercado")
          ->orWhere('name', "=","Postulante a Superintendente de Comunicación");
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }
}
