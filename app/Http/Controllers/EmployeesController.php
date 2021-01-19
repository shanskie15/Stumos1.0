<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;

class EmployeesController extends Controller
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
    public function index()
    {
		$employees = User::where('deleted','0')->get();
		return view('admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$employee = User::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
			'lastname' => $request->lastname,
			'contact' => $request->contact,
			'address' => $request->address,
			'gender' => $request->gender,
			'birth_date' => $request->birth_date,
			'email' => $request->email,
            'personnel_type' => $request->personnel_type,
            'password' => Hash::make($request->password),
		]);
		
		return redirect()->route('employees.index');
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$employee = User::find($id);
		return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      	$employee = User::find($id);
		return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			
		$employee->firstname = $request->firstname;
		$employee->middlename = $request->middlename;
		$employee->lastname = $request->lastname;
		$employee->email = $request->email;
		$employee->gender = $request->gender;
		$employee->birth_date = $request->birth_date;
		$employee->contact = $request->contact;
		$employee->address = $request->address;
		$employee->personnel_type = $request->personnel_type;
		$employee->password = Hash::make($request->password);
		$employee->save();
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
		// hard delete
    public function destroy($id)
    {
		$check = Division::where('agent_id',$id)->first();
		if( null == $check){
			$employee = User::find($id);
			$employee->delete();
			return response()->json([
				'status' => 'success',
				'message' => 'Employee deleted from the database!'
			]);
		}
		return response()->json([
			'status' => 'error',
			'message' => 'Employee cannot be deleted from the database!'
		]);
	}
	// soft delete
	public function delete($id)
	{
		$check = Division::where('deleted','0')->where('agent_id',$id)->first();
		if(null == $check){
			$employee = User::find($id);

			$employee->deleted = '1';
			$employee->save();
			return response()->json([
				'status' => 'success',
				'message' => 'Employee removed from the list.'
			]);
		}
		return response()->json([
			'status' => 'error',
			'message' => 'Employee cannot be removed from the list!'
		]);
	}
}
