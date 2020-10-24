<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'semester',
    ];

    public static $insertRoles = [
        'semester' => 'required',
    ];

    public function students(){
        return $this->hasMany('App\Student');
    }
    public function results(){
        return $this->hasMany('App\Result');
    }

}
