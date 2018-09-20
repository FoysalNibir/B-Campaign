<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threat extends Model
{
    public function constituency()
    {
        return $this->belongsTo('App\Constituency');
    }
}
