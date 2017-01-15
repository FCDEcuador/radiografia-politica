<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
      'user_id','urlSri','urlHeritage','urlCompanies','urlJudicial','urlPenal','urlStudy','urlComptroller','urlProfile'
    ];

    public function penals()
    {
      return $this->hasMany(Penal::class);
    }

    public function judicials()
    {
      return $this->hasMany(Judicial::class);
    }

    public function companies()
    {
      return $this->hasMany(Company::class);
    }

    public function heritage()
    {
      return $this->hasOne(Heritage::class);
    }

    public function sri()
    {
      return $this->hasMany(SRI::class);
    }

    public function study()
    {
      return $this->hasOne(Study::class);
    }

    public function comptroller()
    {
      return $this->hasOne(Comptroller::class);
    }

    public function person()
    {
      return $this->hasOne(Person::class);
    }
}
