<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $fillable = [
    'user_id','profile_id','name', 'position', 'total_companies'
  ];
}
