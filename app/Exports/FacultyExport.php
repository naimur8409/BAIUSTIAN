<?php

namespace App\Exports;

use App\Faculty;
use Maatwebsite\Excel\Concerns\FromCollection;

class FacultyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Faculty::all();
    }
}
