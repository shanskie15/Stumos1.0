<?php

namespace App\Http\Controllers;

use App\User;
use App\Section;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sections = Section::all();
        $students = Student::where('deleted','0')->get();
        return view('admin.student.index', compact('students','sections'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('admin.student.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'idnumber' => Carbon::now()->format('Y').DB::table('students')->count(),
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'year' => $request->year,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'parent_name' => $request->parent_name,
            'pcontact' => $request->pcontact,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('student.index');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $employees = User::where('personnel_type','teacher')->get();
        $sections = Section::all();
        return view('admin.student.edit', compact('student','employees','sections'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required'
        ]);
        $student = Student::find($id);
        $student->first_name = $request->get('firstname');
        $student->middle_name = $request->get('middlename');
        $student->last_name = $request->get('lastname');
        $student->contact = $request->get('contact');
        $student->year = $request->get('year');
        $student->parent_name = $request->get('parentname');
        $student->pcontact = $request->get('pcontact');
        $student->section_id = $request->get('section_id');
        $student->save();

        return redirect()->route('student.index')->with('success','student updated successfully');
    }

    public function show($id)
    {
        $student = Student::find($id);
        // $Employees = Employee::where('personnel_type','teacher')->get();
        $sections = Section::all();
        return view('admin.student.show', compact('student','sections'));
    }

    public function destroy($id)
    {
		$student = Student::find($id);
		$student->delete();
		return response()->json([
			'status' => 'success',
			'message' => 'Student deleted from the database!'
		]);
	}
	// soft delete
	public function delete($id)
	{
		$student = Student::find($id);
		$student->deleted = '1';
		$student->save();
		return response()->json([
			'status' => 'success',
			'message' => 'Student removed from the list.'
		]);
    }
    public function export()
    {
        // if(!Auth::Employee()->areRoles([1]) && !request()->ajax()){
        //     return back();
        // }
        // if(!Auth::Employee()->areRoles([1]) && request()->ajax()){
        //     return response()->json([
        //         'error' => 'Unauthorized access',
        //     ]);
        // }
        return (new StudentsExport)->download('Students'.Carbon::now()->format('_M_d_Y').'.xlsx');
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

        $import = new StudentsImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return back()->withStatus('Excel Fles Imported Successful');

    }
}
