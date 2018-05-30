<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studyarea extends Model
{
    public function modules()
    {
        return $this->hasMany('Module');
    }

    public function students()
    {
        return $this->hasMany('Student');
    }

    public function professors()
    {
        return $this->belongsToMany('Professor');
    }
}
