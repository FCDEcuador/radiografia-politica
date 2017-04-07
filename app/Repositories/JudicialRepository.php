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
        $query->where('name', "Presidente del Consejo de la Judicatura")->orWhere('name','Fiscal General del Estado')->orWhere('name','Presidente de la Corte Constitucional')->orWhere('name','Presidente de la Corte Nacional de Justicia');
      });
    })->select('profiles.*')->with('person')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return Profile::join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Presidente del Consejo de la Judicatura")->orWhere('name','Fiscal General del Estado')->orWhere('name','Presidente de la Corte Constitucional')->orWhere('name','Presidente de la Corte Nacional de Justicia');
      });
    })->select('profiles.*')->with('person')->orderBy('p.lastname')->get();
  }


}
