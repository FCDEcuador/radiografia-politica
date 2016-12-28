<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Judicial extends Model
{
    public function judgmentType()
    {
      return $this->belongsTo(JudgmentType::class);
    }

    protected $fillable = [
      'user_id','profile_id','administrative','civil','constitutional','penal','transit'
    ];
}
