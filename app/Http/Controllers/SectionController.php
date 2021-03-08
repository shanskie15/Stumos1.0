<?php

namespace App\Http\Controllers;

use App\Section;
use App\User;
use Illuminate\Http\Request;
use App\Exports\SectionsExport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = User::where('personnel_type','teacher')->get();
        $sections = Section::where('deleted','0')->get();
        return view('admin.section.index',compact('sections','employees'));
    }

    public function create()
    {
        $employees = User::where('personnel_type','teacher')->get();
        return view('admin.section.create',compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_name'=>'required',
            'room_number'=>'required'
        ]);
        $section = Section::create([
            'section_name' => $request->section_name,
            'room_number' => $request->room_number,
            'user_id' => $request->employee_id,
        ]);

        return redirect()->route('section.index');
    }

    public function edit($id)
    {
        $section = Section::find($id);
        $employees = User::where('personnel_type','teacher')->get();
		return view('admin.section.edit',compact('section', 'employees'));
    }

    public function show($id)
    {
        $section = Section::find($id);
        $employees = User::where('personnel_type','teacher')->get();
        return view('admin.section.show', compact('section', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'section_name'=>'required',
            'room_number'=>'required'
        ]);
        $section = Section::find($id);
        $section->section_name = $request->get('section_name');
        $section->room_number = $request->get('room_number');
        $section->user_id = $request->get('employee_id');
        $section->save();

        return redirect()->route('section.index')->with('success','Section updated successfully');
    }

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

    public function export(Excel $export)
    {
        return (new SectionsExport)->download('Sectons'.Carbon::now()->format('_M_d_Y').'.xlsx');
    }

    public function import(Request $request)
    {
        // if(!Auth::Employee()->areRoles([1]) && !request()->ajax()){
        //     return back();
        // }
        // if(!Auth::Employee()->areRoles([1]) && request()->ajax()){
        //     return response()->json([
        //         'error' => 'Unauthorized access',
        //     ]);
        // }
        $this->validate($request,[
            'file' => 'required|mimes:xls,xlsx',
        ]);
        $file = $request->file('excel')->store('import');

        $import = new SectionsImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return back()->withStatus('Excel Fles Imported Successful');

    }
}
