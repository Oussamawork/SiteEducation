<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function studyarea()
    {
        return $this->belongsTo('Studyarea');
    }
}
