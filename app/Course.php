<?php

namespace App;
use App\Traits\HasStudents;
use App\Course;
use App\Faculty;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    use HasStudents;

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
    public function faculties(){
		return $this->belongsToMany(Faculty::class,'course_faculty');
    }
    public function students(){
		return $this->belongsToMany(Student::class,'course_student');
    }



}
