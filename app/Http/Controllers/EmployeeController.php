<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = User::where('deleted','0')->get();
        return view('admin.employee.index', compact('employees'));
    }

    public function history()
    {
        $employees = User::where('deleted','1')->get();
        return view('admin.employee.history', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'middlename'=>'required',
            'lastname'=>'required'
        ]);

        $employee = User::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'contact' => $request->contact,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'personnel_type' => $request->personnel_type,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employee.index');
    }

    public function show($id)
    {
        $employee = User::find($id);
        return view('admin.employee.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = User::find($id);
		return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname'=>'required',
            'middlename'=>'required',
            'lastname'=>'required'
        ]);
        $employee = User::where('deleted','0')->get($id);
        $employee->firstname = $request->firstname;
        $employee->middlename = $request->middlename;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->birthdate = $request->birthdate;
        $employee->contact = $request->contact;
        $employee->address = $request->address;
        $employee->personnel_type = $request->personnel_type;
        $employee->password = Hash::make($request->password);
        $employee->save();

        return redirect()->route('employee.index');
	}

	// hard delete
    public function destroy($id)
    {
        $employee = User::where('deleted','0')->get($id);
        $employee->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Employee deleted from the database!'
        ]);
    }

    // soft delete
    public function delete($id)
    {
        $employee = User::where('deleted','0')->get($id);

        $employee->deleted = '1';
        $employee->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Employee removed from the list.'
        ]);
    }

    public function export(Excel $export)
    {
        return (new EmployeesExport)->download('Employees'.Carbon::now()->format('_M_d_Y').'.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('excel')->store('import');

        $import = new EmployeesImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return back()->withStatus('Excel Files Imported Successful');
    }
}
