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
}
