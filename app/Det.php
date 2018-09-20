<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Det extends Model
{
    public function constituencies()
    {
        return $this->hasMany('App\Constituency');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
