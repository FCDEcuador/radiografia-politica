<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class State extends Model
{
  protected $fillable = [
    'name'
  ];

  public function scopeDraft($query)
  {
    return $query->where('name',Config::get('state.draft'))->get()->first()->id;
  }

  public function scopeInRevision($query)
  {
    return $query->where('name',Config::get('state.in_revision'))->get()->first()->id;
  }

  public function scopePublished($query)
  {
    return $query->where('name',Config::get('state.published'))->get()->first()->id;
  }

  public function people(){

    return $this->hasMany(Person::class);
  }
}
