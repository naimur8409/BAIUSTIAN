<?php
namespace App\Traits;

use App\Student;

trait HasStudents{

    public function hasStudent(... $students){
		foreach ($students as $student) {
            // return $student;
			if($this->students->contains('s_id', $student)){
				return true;
			}
        }
    }
}
