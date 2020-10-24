<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $filleable = [
        's_id', 'name', 'email','password', 'address', 'phone', 'photo', 'status',
        'blood_group', 'level_term_id', 'semester_id', 'result_id',
    ];

    public static $insertRoles = [
        's_id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    public function semester(){
        return $this->belongsTo('App\Semester');
    }

    public function levelterm(){
        return $this->belongsTo('App\Levelterm');
    }
}
