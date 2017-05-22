<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  protected $fillable = [
  'name','user_id'
  ];

  function scopePresidentId($query){

    return $query->where('name','Presidente de la República')->first()->id;
  }

  function scopeVicePresidentId($query){
    return $query->where('name','Vicepresidente de la República')->first()->id;
  }

  function scopeAsambleistaId($query)
  {
    return $query->where('name','Asambleísta')->first()->id;
  }

}
