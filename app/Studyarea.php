<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studyarea extends Model
{
    public function modules()
    {
        return $this->hasMany('App\Module');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function professors()
    {
        return $this->belongsToMany('App\Professor');
    }

}
