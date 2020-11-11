<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'course_id',
        'faculty_id',
        'student_id',
        'attendence_date',
        'attendence_status'
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
