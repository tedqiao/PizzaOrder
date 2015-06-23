<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('User');
    }
     public function profiles()
    {
        return $this->hasMany('Profile');
    }
}
