<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Models\State;

class PresidencialCandidatesRepository extends ProfileRepository
{

  public function drafts()
  {

    return $this->model->whereHas('person', function ($query){
      $query->where('state_id',State::draft())->where('is_candidate',true)->whereHas('position', function($query){
        $query->where('name', "Presidente")->orWhere('name', "Vicepresidente");
      });
    })->get();
  }

  public function published()
  {
    return $this->model->whereHas('person', function ($query){
      $query->where('state_id',State::published())->where('is_candidate',true)->whereHas('position', function($query){
        $query->where('name', "Presidente")->orWhere('name', "Vicepresidente");
      });
    })->get();
  }
}
