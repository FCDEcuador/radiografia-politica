<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

  protected $fillable = [
    'user_id','profile_id','politicalParty_id','state_id','position_id','is_candidate','type','img','name','lastname','shortDescription','description','plan','twitter','facebook'
  ];

  public function state()
  {
    return $this->belongsTo(State::class);
  }

  public function position()
  {
    return $this->belongsTo(Position::class);
  }

  public function politicalParty()
  {
    return $this->belongsTo(PoliticalParty::class);
  }

  public function timelines()
  {
    return $this->hasMany(Timeline::class);
  }



}
