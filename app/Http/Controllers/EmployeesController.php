<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
			$rules = User::$rules;
			$validator = \Validator::make($request->all(),$rules);
			
			if($validator->fails())
			{
				return response()->json([
					'status' => 'invalid',
					'errors' => $validator->errors()->all()
				]);
			}
			$employee = new User;
			$this->fillEmployee($employee,$request);

			return response()->json([
				'status' => 'success',
				'message' => 'Employee successfully saved!',
				'id' => $employee->id
			]);
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
			// $divisions = Division::where('agent_id',$id)->get();
			// $clients = DB::table('divisions')->join('clients','clients.division_id','divisions.id')->where('clients.deleted','0')->where('divisions.agent_id',$id)->get ();
			// $orders = DB::table('divisions')->join('clients','clients.division_id','divisions.id')->join('orders','orders.client_id','clients.id')->where('clients.deleted','0')->where('divisions.agent_id',$id)->get();
			return view('admin.employees.show',compact('employee'));
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
			return view('admin.employees.edit',compact('employee'));
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
			$rules = User::$rules;
			$rules['email'] .= ',' . $id;
			$rules['contact'] .= ',' . $id;

			$validator = \Validator::make($request->all(),$rules);
			if($validator->fails())
			{
				return response()->json([
					'status' => 'invalid',
					'errors' => $validator->errors()->all()
				]);
			}
			$employee = User::find($id);
			$this->fillEmployee($employee,$request);
			return response()->json([
				'status' => 'success',
				'message' => 'Employee updated!'
			]);
		}
		
		private function fillEmployee($employee,$request)
		{
			$employee->firstname = $request->firstname;
			$employee->middlename = $request->middlename;
			$employee->lastname = $request->lastname;
			$employee->email = $request->email;
			$employee->gender = $request->gender;
			$employee->birth_date = $request->birth_date;
			$employee->contact = $request->contact;
			$employee->address = $request->address;
			$employee->salary = $request->salary;
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
