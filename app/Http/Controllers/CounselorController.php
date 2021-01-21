<?php

namespace App\Http\Controllers;

use App\Counselor;
use Illuminate\Http\Request;
use App\BadRecord;
use App\Student;

class CounselorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('counselor.counsel.create');
    }
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
    public function storeBad(Request $request)
    {
		$request->validate([
            'bad_deed'=>'required',
            'description'=>'required',
        ]);
		$badrecord = BadRecord::create([
            'user_id' => $request->firstname,
            'student_id' => $request->middlename,
			'bad_deed' => $request->lastname,
			'description' => $request->contact,
		]);
		
		return view('badrecord');
	}
    public function store(Request $request)
    {
		$counselor = Counselor::create([
            'student_id' => $request->student_id,
        ]);
        return redirect()->route('counselor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function show(Counselor $counselor)
    {
        //
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
