<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class PublicServantRepository extends ProfileRepository
{

  public function drafts($isCandidate=false)
  {

    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query) use($isCandidate){
      $query->where('state_id',State::draft())->where('is_candidate',$isCandidate)->whereHas('position', function($query) use($isCandidate){

        if(!$isCandidate){
          $query->where('name','!=' ,"Asambleista");
        }else {
          $query->where('name','!=' ,"Asambleista")->where('name','!=', "Presidente")->where('name','!=',"Vicepresidente");
        }

      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }

  public function published($isCandidate=false)
  {
    return $this->model->join('people as p', 'p.id', '=', 'profiles.id')->whereHas('person', function ($query) use ($isCandidate){
      $query->where('state_id',State::published())->where('is_candidate',$isCandidate)->whereHas('position', function($query) use ($isCandidate){
        if(!$isCandidate){
          $query->where('name','!=' ,"Asambleista");
        }else {
          $query->where('name','!=' ,"Asambleista")->where('name','!=', "Presidente")->where('name','!=',"Vicepresidente");
        }
      });
    })->select('profiles.*')->with('person.position')->orderBy('p.lastname')->get();
  }
}
