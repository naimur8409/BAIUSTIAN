<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CourseImport;
use App\Student;
use App\Levelterm;
use App\Semester;
use App\Course;
use App\Faculty;
use File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levelTerms = LevelTerm::all();
        $courses = Course::all();
        $faculties = Faculty::all();
        $course = $courses->groupBy('levelterm_id');
        return view('course.index',compact('levelTerms', 'course', 'faculties'));
    }


    public function list($id)
    {
        $levelTerms = LevelTerm::all();
        $courses = Course::where('levelterm_id',$id)->get();
        $faculties = Faculty::all();
        // $course = $courses->groupBy('levelterm_id');
        return view('student.course_list',compact('levelTerms', 'courses', 'faculties'));
    }

    public function levelterm()
    {
        $levelTerms = LevelTerm::all();
        $courses = Course::all();
        $faculties = Faculty::all();
        $course = $courses->groupBy('levelterm_id');
        return view('student.course_lt',compact('levelTerms', 'course', 'faculties'));
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
        $request->validate(Course::$insertRoles);
        $course = new Course;
        $course->c_code = $request->c_code;
        $course->name = $request->name;
        $course->credit = $request->credit;
        $course->levelterm_id = $request->levelterm_id;
        $status = $course->save();
        if($status){
            $course->faculties()->attach($request->f_id);
            session()->flash('success',"Course created successfully");
            return redirect()->back();
        }
        else{

            session()->flash('error',"Failed");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function register($c_id)
    {
          $id= Student::where('email',auth()->user()->email)->get()->pluck('id');
          $s_id= Student::where('email',auth()->user()->email)->pluck('s_id')->first();

         $courses = Course::all();
          $course = Course::find($c_id);

        if($course->hasStudent($s_id)){

            session()->flash('error',"Course already registered");
            return redirect()->back();
        }
        else{
            $course->students()->attach($id);
            session()->flash('success',"Course registered successfully");
            return redirect()->back();

        }
    }


    public function import()
    {
        Excel::import(new CourseImport,request()->file('file'));
        session()->flash('success',"Course data added successfully");
        return back();
    }
}
