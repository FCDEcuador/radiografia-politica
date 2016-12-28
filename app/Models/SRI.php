<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SRI extends Model
{
    //
    protected $table = "sri";

    protected $fillable = [
      'user_id','profile_id','year','taxType','value'
    ];
}
