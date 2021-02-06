<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

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
      $request->validate([
          'firstname'=>'required',
          'middlename'=>'required',
          'lastname'=>'required'
      ]);
      $employee = User::find($id);
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

      return redirect()->route('employees.index');
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
      $employee = User::find($id);
      $employee->delete();
      return response()->json([
        'status' => 'success',
        'message' => 'Employee deleted from the database!'
      ]);
    }
	// soft delete
	public function delete($id)
	{
		$employee = User::find($id);

		$employee->deleted = '1';
		$employee->save();
		return response()->json([
			'status' => 'success',
			'message' => 'Employee removed from the list.'
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
          return  (new EmployeesExport)->download('EmployeeRecords['.now().'].xlsx');
          // return back()->with('success','Excel file has been generated.');
      }catch(\Exception $e){
          return back()->with('error','Unable to generate excel file!');
      }
  }
  public function import()
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
    return view('admin.employees.upload');
  }
  public function importExcel(Request $request)
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
