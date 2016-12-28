<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
  protected $fillable = [
    'user_id','profile_id','profession','pregrade','postgrad','phd'
    ];
}
