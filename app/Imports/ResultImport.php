<?php

namespace App\Imports;

use App\Result;
use Maatwebsite\Excel\Concerns\ToModel;

class ResultImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Result([
            'student_id'=> $row[0],
            'faculty_id'=> $row[1],
            'course_id'=> $row[2],
            'semester_id'=> $row[3],
            'levelterm_id'=> $row[4],
            'gpa'=> $row[5],
            'retake'=> $row[6],
            'backlog'=> $row[7],
        ]);
    }
}
