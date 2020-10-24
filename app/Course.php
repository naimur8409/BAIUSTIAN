<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =
    [
        'c_code', 'name', 'credit', 'levelterm_id',
    ];

    public static $insertRoles = [
        'c_code' => 'required',
        'name' => 'required',
        'credit' => 'required',
        'levelterm_id' => 'required',
    ];

    public function levelterm(){
        return $this->belongsTo('App\Levelterm');
    }
}
