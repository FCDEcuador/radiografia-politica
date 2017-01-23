<?php
namespace App\Repositories;

use App\Models\Profile;
use App\Models\Position;
use App\Models\Person;
use App\Models\State;

class AdminRepository
{
  function __construct()
  {

  }

  public function dashboard()
  {

    return [
      'published' => [
        'binomialCandidates' => Person::where('position_id',Position::presidentId())->where('state_id',State::published())->count(),
        'deputyCandidates' => Person::where('position_id',Position::asambleistaId())->where('state_id',State::published())->where('is_candidate',true)->count(),
        'deputys' => Person::where('position_id',Position::asambleistaId())->where('state_id',State::published())->where('is_candidate',false)->count(),
        'publicServants' => Person::where('position_id','!=',Position::asambleistaId())
                              ->where('state_id',State::published())->where('is_candidate',false)->count()
      ],
      'draft' => [
        'binomialCandidates' => Person::where('position_id',Position::presidentId())->where('state_id',State::draft())->count(),
        'deputyCandidates' => Person::where('position_id',Position::asambleistaId())->where('state_id',State::draft())->where('is_candidate',true)->count(),
        'deputys' => Person::where('position_id',Position::asambleistaId())->where('state_id',State::draft())->where('is_candidate',false)->count(),
        'publicServants' => Person::where('position_id','!=',Position::asambleistaId())
                              ->where('state_id',State::draft())->where('is_candidate',false)->count()
      ]
    ];
  }

}
