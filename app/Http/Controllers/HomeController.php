<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Faculty;
use App\Semester;
use App\Course;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $student = Student:: all()->count();
        $semester = Semester:: all()->count();
        $faculty = Faculty:: all()->count();
        $course = Course:: all()->count();
        $user = User:: all()->count();
        return view('home',compact('student','faculty','semester','course','user'));
    }
}
