<?php

namespace App\Imports;

use App\Faculty;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class FacultyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Faculty([
            'f_id'=> $row[0],
            'name'=> $row[1],
            'email'=> $row[2],
            'password'=> \Hash::make($row[3]),
            'address'=> $row[4],
            'designation'=> $row[5],
            'phone'=> $row[6],
            'photo'=> $row[7],
            'joining_date'=> $row[8],
            'blood_group'=> $row[9],
            'status'=> $row[10],
        ]);
    }
}
