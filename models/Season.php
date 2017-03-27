<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
   public function riders()
    {
        return $this->belongsToMany(Rider::class);
    }
}
