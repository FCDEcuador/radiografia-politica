<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class ElectoralRepository extends ProfileRepository
{

  public function drafts()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::draft())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Presidente del Consejo Nacional Electoral")
        ->orWhere('name','Vicepresidente del Consejo Nacional Electoral')
        ->orWhere('name','Consejero Electoral')
        ->orWhere('name','Director de la Delegación Provincial Electoral')
        ->orWhere('name','Presidente del Tribunal Contencioso Electoral')
        ->orWhere('name','Vicepresidente del Tribunal Contencioso Electoral')
        ->orWhere('name','Juez del Tribunal Contencioso Electoral');
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Presidente del Consejo Nacional Electoral")
        ->orWhere('name','Vicepresidente del Consejo Nacional Electoral')
        ->orWhere('name','Consejero Electoral')
        ->orWhere('name','Director de la Delegación Provincial Electoral')
        ->orWhere('name','Presidente del Tribunal Contencioso Electoral')
        ->orWhere('name','Vicepresidente del Tribunal Contencioso Electoral')
        ->orWhere('name','Juez del Tribunal Contencioso Electoral');
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }
}
