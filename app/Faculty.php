<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'f_id', 'name', 'email', 'password', 'address', 'designation', 'phone', 'photo', 'joining_date',
        'blood_group','status',
    ];

    public static $insertRoles = [
        'f_id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    public function courses(){
		return $this->belongsToMany(Course::class,'course_faculty');
	}
}
