<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

  public function state()
  {
    return $this->belongsTo(Sate::class);
  }

  public function politicalParties()
  {
    return $this->belongsTo(PoliticalParty::class);
  }

  public function timelines()
  {
    return $this->hasMany(Timeline::class);
  }
}
