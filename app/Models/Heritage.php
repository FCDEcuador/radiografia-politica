<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heritage extends Model
{
  protected $fillable = [
    'profiles_id','houses','cars','money','companies','previousDeclaration','previousAssets','previousHeritage', 'actualDeclaration','actualAssets','actualLiabilities','actualHeritage'
  ];
}
