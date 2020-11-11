<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            's_id'=> $row[0],
            'name'=> $row[1],
            'email'=> $row[2],
            'password'=> \Hash::make($row[3]),
            'address'=> $row[4],
            'phone'=> $row[5],
            'photo'=> $row[6],
            'blood_group'=> $row[7],
            'status'=> $row[8],
            'levelterm_id'=> $row[9],
            'semester_id'=> $row[10],
        ]);
    }
}
