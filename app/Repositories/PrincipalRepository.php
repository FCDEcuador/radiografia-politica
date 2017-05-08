<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class PrincipalRepository extends ProfileRepository
{

  public function drafts()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::draft())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Presidente de la República")->orWhere('name','Vicepresidente de la República')->orWhere('name','Presidente de la Asamblea Nacional')->orWhere('name','Primer Vicepresidente de la Asamblea Nacional')->orWhere('name','Segundo Vicepresidente de la Asamblea Nacional')->orWhere('name','Presidente de la Corte Constitucional')->orWhere('name','Presidente del Consejo Nacional Electoral')->orWhere('name','Vicepresidente del Consejo Nacional Electoral')->orWhere('name','Presidente del Tribunal Contencioso Electoral')->orWhere('name','Defensor del Pueblo Nacional')->orWhere('name','Presidente del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Vicepresidente del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Contralor General del Estado')->orWhere('name','Defensor Público Nacional')->orWhere('name','Fiscal General del Estado')->orWhere('name','Presidente del Consejo de la Judicatura')->orWhere('name','Presidente de la Corte Nacional')->orWhere('name','Procurador General del Estado');
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }

  public function published()
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',false)->whereHas('position', function($query){
        $query->where('name', "Presidente de la República")->orWhere('name','Vicepresidente de la República')->orWhere('name','Presidente de la Asamblea Nacional')->orWhere('name','Primer Vicepresidente de la Asamblea Nacional')->orWhere('name','Segundo Vicepresidente de la Asamblea Nacional')->orWhere('name','Presidente de la Corte Constitucional')->orWhere('name','Presidente del Consejo Nacional Electoral')->orWhere('name','Vicepresidente del Consejo Nacional Electoral')->orWhere('name','Presidente del Tribunal Contencioso Electoral')->orWhere('name','Defensor del Pueblo Nacional')->orWhere('name','Presidente del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Vicepresidente del Consejo de Participación Ciudadana y Control Social')->orWhere('name','Contralor General del Estado')->orWhere('name','Defensor Público Nacional')->orWhere('name','Fiscal General del Estado')->orWhere('name','Presidente del Consejo de la Judicatura')->orWhere('name','Presidente de la Corte Nacional')->orWhere('name','Procurador General del Estado');
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }
}
