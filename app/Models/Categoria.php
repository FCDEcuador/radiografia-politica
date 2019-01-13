<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Categoria extends Model
{

  protected $table = 'categorias';

  protected $fillable = [
  'nombre','estado','slug','meta_keywords','meta_description'
  ];

  // Categoria __belongs_to_many__ Position
  public function positions() {
          return $this->belongsToMany('App\Models\Position');
  }

  public static function bySlug($slug = ''){
    if($slug){
      return Categoria::where('slug','=',$slug)->first();
    }else{
      return FALSE;
    }
  }

  function scopeCategoriaId($query){

    //return $query->where('name','Presidente de la República')->first()->id;
  }

  function scopeActivas($query){

    return $query->where('estado','=','1');
  }



  

}
