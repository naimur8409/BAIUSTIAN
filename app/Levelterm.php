<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levelterm extends Model
{
    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function students(){
        return $this->hasMany('App\Student');
    }
}
