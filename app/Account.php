<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function due()
    {
        return $this->belongsTo('App\Due');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }
}
