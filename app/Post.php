<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Post extends Model
{
    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function module()
    {
        return $this->belongsTo('App\Module');
    }
}
