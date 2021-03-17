<?php

namespace App\Http\Controllers;

use App\Counselor;
use Illuminate\Http\Request;
use App\BadRecord;
use App\Student;
use App\Counselling;
use App\User;
use App\Section;
use App\CounselorCreate;
use Illuminate\Support\Facades\DB;

class CounselorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
	{
		$this->middleware('auth');
	}
    
    public function index()
    {
        $counselors = Counselor::where('deleted','0')->get();
        $students = Student::where('deleted','0')->get();
		return view('counselor.counselor_home',compact('counselors','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function createBadRecord()
    {
        $counselors = Counselor::where('deleted','0')->get();
        $students = Student::where('deleted','0')->get();
        return view('counselor.badrecord.create',compact('counselors','students'));
    } 
    public function createCounsel()
    {
        $counselors = Counselor::where('deleted','0')->get();
        $students = Student::where('deleted','0')->get();
        return view('counselor.counsel.create',compact('counselors','students'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBad(Request $request)
    {
		$request->validate([
            'bad_deed'=>'required',
            'description'=>'required',
        ]);
		$badrecord = BadRecord::create([
            'user_id' => $request->user_id,
            'student_id' => $request->student_id,
			'bad_deed' => $request->bad_deed,
			'description' => $request->description,
		]);
		
        return redirect()->route('counselor.index');
	}
    public function store(Request $request)
    {
		$counselor = Counselor::create([
            'student_id' => $request->student_id,
        ]);
        return redirect()->route('counselor.index');
    }
    

    public function storeCounsel(Request $request)
    {
        $request->validate([
            'description'=>'required',
        ]);
        
		$Counselling = Counselling::create([
            'user_id' => $request->user_id,
            'student_id' => $request->student_id,
			'description' => $request->description,
        ]);
        
        return redirect()->route('counselor.index');
    }

    public function showProfile($id)
    {
        $student = Student::find($id);
        return view('counselor.student.index', compact('student'));
    }

    public function showCounsellingProfile($id)
    {
        $student = Student::find($id);
        $users = User::where('personnel_type','counselor')->get();
        $counsellings = Counselling::where('student_id', $id)->get();
        $datas = DB::table('users')
        ->join('counsellings', 'users.id', 'counsellings.user_id')
        ->where('student_id',$id)
        ->get(); 
        //  dd($datas);  
            return view('counselor.student.counselling_profile', compact('student', 'datas'));
    }

    public function studentBadRecordProfile($id)
    {
        $student = Student::find($id);
        $users = User::where('personnel_type','counselor')->get();
        $badrecords = BadRecord::where('student_id', $id)->get();
        $datas = DB::table('users')
        ->join('bad_records', 'users.id', 'bad_records.user_id')
        ->where('student_id',$id)
        ->get();
        return view('counselor.student.badrecord_profile', compact('student','datas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function show(Counselor $counselor)
    {
        
    }

    public function showDesc($id)
    {
        $student = User::find($id);
        $counsellings = Counselling::where('student_id', $id)->get();
        return view('counselor.student.show', compact('student', 'counsellings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function edit(Counselor $counselor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counselor $counselor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counselor $counselor)
    {
        //
    }
}
