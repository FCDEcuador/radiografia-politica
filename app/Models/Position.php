<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Position extends Model
{
  
  protected $table = 'positions';

  protected $fillable = [
  'name','categoria_id','user_id',
  ];

  // Position __belongs_to_many__ Categoria
  public function categorias() {
          return $this->belongsToMany('App\Models\Categoria');
  }  

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
