<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliticalParty extends Model
{
    protected $table = "politicalParties";

    protected $fillable = [
      'user_id','name','img'
    ];

}
