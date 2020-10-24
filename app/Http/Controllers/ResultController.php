<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Levelterm;
use App\Course;
use App\Student;
use App\Faculty;
use App\Result;
use App\Semester;
use App\Notice;
use Auth;
use File;
class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levelterm = Levelterm::all();
        $semesters = Semester::all();
        $faculties = Faculty::all();
        $courses = Course::all();
        $students = Student::all();
        $results = Result::latest()->get();
        return view('result.index',compact('levelterm','semesters','faculties','courses','students','results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Result::$insertRoles);
        $result = new Result;
        $result->create($request->all());
        session()->flash('success',"Result created successfully");
        return redirect()->back();
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
        $result = Result::find($id);
        $levelterm = Levelterm::all();
        $semesters = Semester::all();
        $faculties = Faculty::all();
        $courses = Course::all();
        $students = Student::all();
        $results = Result::latest()->get();
        return view('result.edit',compact('result','levelterm','semesters','faculties','courses','students','results'));

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
        $result = Result::findorfail($id);
        $result->update($request->all());
        session()->flash('success',"Result updated successfully");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Result::findorfail($id);
        $result->delete();
        session()->flash('success',"Result deleted successfully");
        return redirect()->back();
    }

    public function myResult(){

        $levelterms = Levelterm::all();
        $datas = Result::all()->where('student_id', auth()->user()->id);
        return view('result.myResult', compact('levelterms','datas'));
    }


    public function view($id){

        // $semesters = Semester::all();
        $datas = Student::all()->where('semester_id', $id);
        // return $datas;
        return view('result.view', compact('datas'));
    }

    public function student_result($id,$semester_id){

        // $semesters = Semester::all();
        $datas = Result::all()->where('student_id', $id)->where('semester_id', $semester_id);
        // return $datas;
        return view('result.student_result', compact('datas'));
    }

    public function ct_result()
    {
        $levelterm = Levelterm::all();
        $semesters = Semester::all();
        $faculties = Faculty::all();
        $courses = Course::all();
        $students = Student::all();
        if(auth()->user()->hasRole('faculty')){
            $results = Notice::all()->where('created_by',Auth::user()->id);
            return view('result.ct_result',compact('levelterm','semesters','faculties','courses','students','results'));
        }
        if(auth()->user()->hasRole('admin')){
            $results = Notice::latest()->get();
            return view('result.ct_result',compact('levelterm','semesters','faculties','courses','students','results'));
        }
    }

    public function ct_store(Request $request)
    {
        // $request->validate(Result::$insertRoles);
// return $request->all();
        $result = new Notice;
        $result->semester_id = $request->semester_id;
        $result->title = $request->title;
        $result->text = $request->text;
        $result->created_by = Auth::user()->id;





    if (isset($_FILES['documents'])) {
        $file = $request->file('documents');
        $name = $file->getClientOriginalName();
        $file->move('images/results', $name);


        $result->documents = $name;
    }

    $status = $result->save();
    if($status){

        session()->flash('success',"NOTICE created successfully");
        return redirect()->back();
    }

    }
}
