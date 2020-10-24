<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $filleable = [
        'f_id', 'name', 'email', 'password', 'address', 'designation', 'phone', 'photo', 'joining_date',
        'blood_group',
    ];

    public static $insertRoles = [
        'f_id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];
}
