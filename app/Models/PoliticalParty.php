<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliticalParty extends Model
{
    protected $table = "politicalParties";

    protected $fillable = [
      'user_id','name','img'
    ];

    function people()
    {
      return $this->hasMany(Person::class,'politicalParty_id');
    }

    function scopePresident($query)
    {
      return $query->where('id',$this->id)->whereHas('people', function ($q) {
        $q->where('position_id', Position::presidentId());
      })->first();
    }

    function scopeVicePresident($query)
    {
      return $query->where('id',$this->id)->whereHas('people', function ($q) {
        $q->where('position_id', Position::vicePresidentId());
      })->first();
    }

}
