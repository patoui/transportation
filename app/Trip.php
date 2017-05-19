<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function stopTimes()
    {
        return $this->hasMany(StopTime::class);
    }

    public function stops()
    {
        return $this->belongsToMany(Stop::class, 'stop_times');
    }
}
