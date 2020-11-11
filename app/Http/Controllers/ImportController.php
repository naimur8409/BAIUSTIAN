<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Excel;
use App\Imports\FacultyImport;
use Maatwebsite\Excel\Facades\Excel;
class ImportController extends Controller
{
    public function importExportView()
    {
       return view('faculty.import');
    }
    public function import()
    {
        // return 'ok';
        $status = Excel::import(new FacultyImport,request()->file('file'));
        if($status){
            return 'Ok';
        }
        else{
            return 'bad luck';
        }
        // return back();
    }
}
