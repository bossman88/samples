<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function riders()
    {
        return $this->belongsToMany(Rider::class)->withPivot('points', 'position');
    }
}
