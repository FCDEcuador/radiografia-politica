<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
  protected $fillable = [
    'user_id','person_id','typeEvent','start','end','shortDescription','description','source'
  ];
}
