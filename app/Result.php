<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'student_id', 'faculty_id', 'course_id', 'semester_id', 'levelterm_id', 'gpa', 'retake',
        'backlog'
    ];
    public static $insertRoles = [
        'student_id' => 'required',
        'faculty_id' => 'required',
        'course_id' => 'required',
        'semester_id' => 'required',
        'levelterm_id' => 'required',
        'gpa' => 'required',
        'retake' => 'required',
        'backlog' => 'required',
    ];

    public function semester(){
        return $this->belongsTo('App\Semester');
    }

    public function levelterm(){
        return $this->belongsTo('App\Levelterm');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }
}
