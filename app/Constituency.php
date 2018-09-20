<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    public function det()
    {
        return $this->belongsTo('App\Det');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function circulations()
    {
        return $this->hasMany('App\Circulations');
    }

    public function threats()
    {
        return $this->hasMany('App\Threat');
    }
}
