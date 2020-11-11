<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Levelterm;
use App\Semester;
use App\Course;
use App\Faculty;
use App\Attendance;
use Carbon\Carbon;
use DB;
use File;
class AttendanceController extends Controller
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
        return view('attendance.courses',compact('levelTerms', 'course', 'faculties'));
    }

    public function student_list($id)
    {
        //  $id;
        $levelTerms = LevelTerm::all();
        $course = Course::find($id);
        $faculties = Faculty::all();
        $student = $course->students()->get();
        // return $student;
        return view('attendance.attendance_sheet',compact('levelTerms', 'course', 'student'));
    }


    public function attendance_list($id)
    {
        $months = Attendance::select('attendence_date')->where('course_id',$id)->groupBy('attendence_date')->latest()->get();
        $course_id = $id;
        return view('attendance.attendance_month',compact('months','course_id'));
    }
    public function attendance_details($date, $course_id)
    {
        $attendances = Attendance::where('course_id', $course_id)->where('attendence_date', $date)->get();

        return view('attendance.attendance_details', compact('attendances'));

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
        // return $request ->all();
        $attenddate = date('Y-m-d');
        $faculty = Faculty::where('email',auth()->user()->email)->get();
        $id = $faculty->pluck('id')->first();
        $c_id = $request->course_id;

        $dataexist = Attendance::whereDate('attendence_date',$attenddate)
                                ->where('course_id',$c_id)
                                ->get();

        if (count($dataexist) !== 0 ) {
            session()->flash('error',"Already taken");
            return redirect()->back();
        }

        foreach ($request->attendance as $studentid => $attendance) {

            if( $attendance == 'p' ) {
                $attendence_status = true;
            } else if( $attendance == 'a' ){
                $attendence_status = false;
            }

            Attendance::create([
                'course_id'          => $c_id,
                'faculty_id'        => $id,
                'student_id'        => $studentid,
                'attendence_date'   => $attenddate,
                'attendence_status' => $attendence_status
            ]);
        }
        session()->flash('success',"Attendance taken successfully.!");
        return redirect()->back();

        return back();
    }

    public function change_status(){
        $old_status=Request('status');
        $student_id=Request('student_id');
        $status=Attendance::find($student_id);
        $status->attendence_status= $old_status;
        $status->update();
        Session()->flash('success', 'Status Changed Successfully!');
        Session()->flash('type', 'success');
        return 'test';
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
}
