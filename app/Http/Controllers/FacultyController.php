<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FacultyImport;
use App\Exports\FacultyExport;
use App\Faculty;
use App\User;
use App\Role;
use File;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::latest()->get();
        return view('faculty.index',compact('faculties'));
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
        $request->validate(Faculty::$insertRoles);

        $faculty = new Faculty;
        $faculty->f_id = $request->f_id;
        $faculty->name = $request->name;
        $faculty->email = $request->email;
        $faculty->password =  Hash::make($request->password);
        $faculty->phone = $request->phone;
        $faculty->address = $request->address;
        $faculty->joining_date = $request->joining_date;
        $faculty->designation = $request->designation;
        $faculty->blood_group = $request->blood_group;


    if (isset($_FILES['photo'])) {
        $file = $request->file('photo');
        $name = $file->getClientOriginalName();
        $file->move('images/faculties', $name);


        $faculty->photo = $name;
    }

    $status = $faculty->save();
    if($status){
        $request->validate(User::$insertRoles);
        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password) ;
        $status = $user->save();
        if($status){
            $user->roles()->attach('2');
        }
        session()->flash('success',"Faculty created successfully");
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
        $faculty = Faculty::findorfail($id);
        $faculty->f_id = $request->f_id;
        $faculty->name = $request->name;
        $faculty->email = $request->email;
        $faculty->phone = $request->phone;
        $faculty->address = $request->address;
        $faculty->joining_date = $request->joining_date;
        $faculty->designation = $request->designation;
        $faculty->blood_group = $request->blood_group;


        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $file->move('images/faculties', $name);

            File::delete('images/faculties/'.$faculty->photo);
            $faculty->photo = $name;
        }


    $status = $faculty->save();
    if($status){
        session()->flash('success',"Faculty Updated successfully");
        return redirect()->back();
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::findorfail($id, $email);
        $status = $faculty->delete();
        if($status){
            $user = User::where('email', $email)->first();
            $status = $user->delete();

            if($status){
                $user->roles()->detach('2');
            }
        }
        session()->flash('success',"Faculty Updated successfully");
        return redirect()->back();
    }

    public function import()
    {
        $status = Excel::import(new FacultyImport,request()->file('file'));
        return back();
    }

    public function export()
    {
        return Excel::download(new FacultyExport, 'faculty-collection.xlsx');
    }
}
