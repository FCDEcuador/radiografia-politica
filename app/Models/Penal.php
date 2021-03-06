<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penal extends Model
{
    //

    public function judgmentType()
    {
      return $this->belongsTo(JudgmentType::class);
    }

    protected $fillable = [
      'user_id','profile_id','total','judgment_type_id'
    ];
}
