<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comptroller extends Model
{
    protected $fillable = [
      'user_id','profile_id','processes'
    ];
}
