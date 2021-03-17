<?php

namespace App\Http\Controllers;

use App\Healthcare;
use App\Student;
use Illuminate\Http\Request;

class HealthcareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::where('deleted','0')->get();
		return view('clinic.clinic_layout', compact('students'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function show(Healthcare $healthcare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function edit(Healthcare $healthcare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Healthcare $healthcare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Healthcare  $healthcare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Healthcare $healthcare)
    {
        //
    }
}
