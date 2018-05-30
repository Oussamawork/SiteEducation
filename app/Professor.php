<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function studyareas()
    {
        return $this->belongsToMany('Studyarea');
    }
}
