<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliticalParty extends Model
{
    protected $table = "politicalParties";

    protected $fillable = [
      'user_id','name','img'
    ];

    public function people()
    {
      return $this->hasMany(Person::class,'politicalParty_id');
    }

    public function scopePresident($query)
    {
      $person = $query->where('id',$this->id)->first()
        ->people()
        ->where('position_id',Position::presidentId())
        ->first();

      return (isset($person)) ? $person->profile()->with('person')->first() : null;
    }

    public function scopeVicepresident($query)
    {
      $person = $query->where('id',$this->id)->first()
        ->people()
        ->where('position_id',Position::vicePresidentId())
        ->first();
        
      return (isset($person)) ? $person->profile()->with('person')->first() : null;
    }

}
