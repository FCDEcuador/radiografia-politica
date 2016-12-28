<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Judicial extends Model
{


    protected $fillable = [
      'user_id','profile_id','judgment_type_id'
    ];

    public function judgmentType()
    {
      return $this->belongsTo(JudgmentType::class);
    }
}
