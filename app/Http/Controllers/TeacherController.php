<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Student;
use App\Section;
use App\User;
use App\Attendance;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the students
     *
     * @param  \App\student  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $students = Student::where('deleted','0')->get();
        return view('teacher.teacher_home', compact('students'));
    }
    public function attendance()
    {
        // $students = Student::where('deleted','0')->get();
        return view('teacher.attendance.index');
    }
}
