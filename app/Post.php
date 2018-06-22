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

    public function scopeSearchByKeyword($query, $search)
    {
        if (filled($search)) {
            $keywords = explode(' ', $search);
            $query->where(function ($query) use ($keywords) {
                $query->where('title', 'LIKE', '%' . array_shift($keywords) . '%');
            });

            foreach ($keywords as $keyword) {
                $query->orWhere(function ($query) use ($keyword) {
                    $query->orWhere('title', 'LIKE', "%$keyword%");
                });
            }
        }
        return $query;
    }
}
