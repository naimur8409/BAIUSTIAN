<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Due;
use App\Semester;
use App\Student;
use App\Account;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myDue()
    {    $student = Student::where('email',auth()->user()->email)->get();
         $id = $student->pluck('id');
         $account = Account::where('student_id',$id)->get();
        // $attendance = $data->groupBy('created_at');
        $students = Student::all();
        $semesters = Semester::all();
        $due_type = Due::all();
        return view('account.myDue',compact('due_type','students','semesters','account'));
    }

    public function index()
    {
        $account = Account::all();
        $students = Student::all();
        $semesters = Semester::all();
        $due_type = Due::all();
        return view('account.index',compact('due_type','students','semesters','account'));
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
        $n = count($request->ammount);
        for($i=0; $i<$n; $i++){
            $account[] = [
                'student_id' => $request->student_id,
                'semester_id' => $request->semester_id,
                'due_id' => $request->due_id[$i],
                'ammount' => $request->ammount[$i],

            ];

        $status = Account::insert($account);
        if($status){
            session()->flash('success',"Added successfully");
            return redirect()->back();
        }
        else{
            session()->flash('error',"Something wrong");
            return redirect()->back();
        }
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
        return $account = Account::find($id);
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

    public function search_dueType($type){
        $account = Account::where('due_id',$type)->get();
        $students = Student::all();
        $semesters = Semester::all();
        $due_type = Due::all();
        return view('account.index',compact('due_type','students','semesters','account'));
    }
    public function search_student($id){
        $account = Account::where('student_id',$id)->get();
        $students = Student::all();
        $semesters = Semester::all();
        $due_type = Due::all();
        return view('account.index',compact('due_type','students','semesters','account'));
    }
    public function search_semester($id){
        $account = Account::where('semester_id',$id)->get();
        $students = Student::all();
        $semesters = Semester::all();
        $due_type = Due::all();
        return view('account.index',compact('due_type','students','semesters','account'));
    }
}
