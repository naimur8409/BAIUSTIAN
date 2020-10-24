<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $filleable = [
        'title', 'text', 'photo', 'documents',
    ];
    public static $insertRoles = [
        'title' => 'required',

    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function semester(){
        return $this->belongsTo('App\Semester');
    }
}
