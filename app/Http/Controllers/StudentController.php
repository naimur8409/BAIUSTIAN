<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;
// use App\Exports\FacultyExport;
use App\Student;
use App\Levelterm;
use App\Semester;

use App\User;
use App\Role;
use File;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->get();
        $levelTerms = LevelTerm::all();
        $semesters = Semester::all();
        return view('student.index',compact('students', 'levelTerms', 'semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Student::$insertRoles);

        $student = new Student;
        $student->s_id = $request->s_id;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password =  Hash::make($request->password);
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->levelTerm_id = $request->levelTerm_id;
        $student->semester_id = $request->semester_id;
        $student->blood_group = $request->blood_group;


    if (isset($_FILES['photo'])) {
        $file = $request->file('photo');
        $name = $file->getClientOriginalName();
        $file->move('images/students', $name);


        $student->photo = $name;
    }

    $status = $student->save();
    if($status){
        $request->validate(User::$insertRoles);
        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password) ;
        $status = $user->save();
        if($status){
            $user->roles()->attach('3');
        }
        session()->flash('success',"Student created successfully");
        return redirect()->back();
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $student = Student::findorfail($id);
        $student->s_id = $request->s_id;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->levelTerm_id = $request->levelTerm_id;
        $student->semester_id = $request->semester_id;
        $student->blood_group = $request->blood_group;



        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $file->move('images/students', $name);

            File::delete('images/students/'.$student->photo);
            $student->photo = $name;
        }

    $status = $student->save();
    if($status){

        session()->flash('success',"Student created successfully");
        return redirect()->back();
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $email)
    {
        $student = Student::findorfail($id);
        $status = $student->delete();
        if($status){
            $user = User::where('email', $email)->first();
            $status = $user->delete();

            if($status){
                $user->roles()->detach('2');
            }
        }
        session()->flash('success',"Student Updated successfully");
        return redirect()->back();
    }


    public function profile(){
        $data = Student::where('email', auth()->user()->email)->first();
        return view('student.profile', compact('data'));
    }

    public function batch($id){

        // $semesters = Semester::all();
        $datas = Student::all()->where('semester_id', $id);
        // return $datas;
        $levelTerms = LevelTerm::all();
        $semesters = Semester::all();
        return view('student.batch', compact('datas','levelTerms','semesters'));
    }
    public function import()
    {
        Excel::import(new StudentImport,request()->file('file'));
        session()->flash('success',"Student data added successfully");
        return back();
    }


}
