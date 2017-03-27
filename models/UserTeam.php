<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTeam extends Model
{
   public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function riders()
    {
        return $this->belongsToMany(Rider::class);
    }

public $fillable = ['name', 'user_id'];
}
