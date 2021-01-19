<?php

namespace App\Http\Controllers;

use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Section $model)
    {
        $employees = User::where('personnel_type','teacher')->get();
        return view('admin.section.index',['sections' => $model->paginate(15)],compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::where('personnel_type','teacher')->get();
        return view('admin.section.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = Section::create([
            'section_name' => $request->section_name,
            'room_number' => $request->room_number,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('section.index');
    }

    public function edit($id)
    {
        $section = Section::find($id);
        $employees = User::where('personnel_type','teacher')->get();
		return view('admin.section.edit',compact('section', 'employees'));
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);
        $employees = User::where('personnel_type','teacher')->get();
        return view('admin.section.show', compact('section', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'section_name'=>'required',
            'room_number'=>'required'
        ]);
        $section = Section::find($id);
        $section->section_name = $request->get('section_name');
        $section->room_number = $request->get('room_number');
        $section->user_id = $request->get('user_id');
        $section->save();
        
        return redirect()->route('section.index')->with('success','Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();

        return redirect()->route('section.index')->with('success', 'Section deleted!');
    }
}
