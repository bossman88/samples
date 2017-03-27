<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function races()
    {
        return $this->belongsToMany(Race::class)->withPivot('points', 'position');
    }

    public function userteams()
    {
        return $this->belongsToMany(Userteam::class);
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class);
    }
//pivot table rider_userteam
    // public function rider_userteam()
    // {
    //     return $this->belongsToMany(Userteam::class, rider_userteam);
    // }
}
