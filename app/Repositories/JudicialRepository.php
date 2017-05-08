<?php
namespace App\Repositories;

use App\Models\Judicial;
use App\Models\Profile;
use App\Models\State;

class JudicialRepository extends Repository
{
  function __construct(Judicial $model)
  {
    $this->model = $model;
  }

  public function drafts()
  {
    return Profile::join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::draft())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Defensor Público")->orWhere('name','Defensor Público Provincial')->orWhere('name','Fiscal General del Estado')->orWhere('name','Fiscales Provinciales')->orWhere('name','Presidente del Consejo de la Judicatura')->orWhere('name','Vocales del Consejo de la Judicatura')->orWhere('name','Directores Provinciales del Consejo de la Judicatura')->orWhere('name','Presidente de la Corte Nacional')->orWhere('name','Presidentes de las Cortes Provinciales')->orWhere('name','Jueces de la Corte Nacional');
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return Profile::join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Defensor Público")->orWhere('name','Defensor Público Provincial')->orWhere('name','Fiscal General del Estado')->orWhere('name','Fiscales Provinciales')->orWhere('name','Presidente del Consejo de la Judicatura')->orWhere('name','Vocales del Consejo de la Judicatura')->orWhere('name','Directores Provinciales del Consejo de la Judicatura')->orWhere('name','Presidente de la Corte Nacional')->orWhere('name','Presidentes de las Cortes Provinciales')->orWhere('name','Jueces de la Corte Nacional');
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }


}
