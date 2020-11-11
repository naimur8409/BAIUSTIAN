<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    protected $fillable = [
        'name',
    ];

    public static $insertRoles = [
        'name' => 'required',
    ];

    public function account(){
        return $this->hasMany('App\Account');
    }
}
