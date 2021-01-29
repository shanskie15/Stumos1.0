<?php

namespace App\Http\Controllers;

use App\Exports\SectionsExport;
use Maatwebsite\Excel\Facades\Excel;
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
		return response()->json([
			'status' => 'success',
			'message' => 'Section deleted from the database!'
		]);
	}
	// soft delete
	public function delete($id)
	{
		$section = Section::find($id);

		$section->deleted = '1';
		$section->save();
		return response()->json([
			'status' => 'success',
			'message' => 'Section removed from the list.'
		]);
    }
    public function export()
    {
        // if(!Auth::user()->areRoles([1]) && !request()->ajax()){
        //     return back();
        // }
        // if(!Auth::user()->areRoles([1]) && request()->ajax()){
        //     return response()->json([
        //         'error' => 'Unauthorized access',
        //     ]);
        // }
        try{
            return  (new SectionsExport)->download('SectionRecords['.now().'].xlsx');
            // return back()->with('success','Excel file has been generated.');
        }catch(\Exception $e){
            return back()->with('error','Unable to generate excel file!');
        }
    }
    public function import(Request $request)
    {
        // if(!Auth::user()->areRoles([1]) && !request()->ajax()){
        //     return back();
        // }
        // if(!Auth::user()->areRoles([1]) && request()->ajax()){
        //     return response()->json([
        //         'error' => 'Unauthorized access',
        //     ]);
        // }
        // $path = $request->file('file')->getRealPath();
        $this->validate($request,[
            'file' => 'required|mimes:xls,xlsx',
        ]);
        try{
            Excel::import(new EmployeeImport, $request->file('file'));
            return back()->with('success','List of employees has been imported.');
        }catch(\Exception $e){
            return back()->with('error','The given data was invalid. Please make sure no duplicate ID number, E-mail address, Username and Contact Number. And please provide all the information except for the middle name which is optional.');
        }
       
    }
}
