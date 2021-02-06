<?php

namespace App\Imports;

use App\User;
use Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        \Validator::make($rows->toArray(),[
            '*.id_number' => 'required',
            '*.first_name' => 'required',
            '*.last_name' => 'required',
            '*.birthdate' => 'required|date',
            '*.email' => 'required|email',
            '*.username' => 'required',
            '*.gender' => 'required',
            '*.contact' => 'required|numeric|digits_between:10,11',
            '*.address' => 'required',
            '*.department' => 'required',
            '*.roles' => 'required',
        ])->validate();
        foreach($rows as $row){
            if(!$person = User::withTrashed()->where('firstname',$row['first_name'])->where('middlename',$row['middle_name'])->where('lastname',$row['last_name'])->first()){
                $person = new User;
                $person->firstname = strtoupper($row['first_name']);
                if(isset($row['middle_name']) && trim($row['middle_name'])!= ''){
                    $person->middlename = strtoupper($row['middle_name']);
                }
                $person->lastname = strtoupper($row['last_name']);
            }
            $person->birthdate = $row['birthdate'];
            $person->gender = $this->gender($row['gender']);
            $person->save();
            $person->restore();
            if(!$employee = Employee::withTrashed()->where('id_number',$row['id_number'])->first()){
                $employee = new Employee;
                $employee->id_number = $row['id_number'];
            }
            if(!$employee->exists || $employee->trashed()){
                $employee->password = \Hash::make('1234');
                $employee->username = $row['username'];
                $employee->email = $row['email'];
                $employee->contact = $row['contact'];
                $employee->address = strtoupper($row['address']);
                $employee->department = $this->department($row['department']);
                $employee->person_id = $person->id;
                $employee->createdby = Auth::user()->id;
                $employee->lastupdated = Auth::user()->id;
                $employee->save();
                $employee->restore();
            }
            $roles_array = explode(', ',$row['roles']);
            $roles_int = [];
            for($i = 0; $i < count($roles_array); $i++){
                $introle = $this->role($roles_array[$i]);
                if(!$role = $employee->trashRole($introle)){
                    $role = new EmployeeRole;
                    $role->employee_id = $employee->id;
                    $role->role = $introle;
                }
                $role->createdby = Auth::user()->id;
                $role->lastupdated = Auth::user()->id;
                $role->save();
                $role->restore();
                $roles_int[] = $introle;
            }
            foreach($employee->roles as $temp){
                if(!in_array($temp->role,$roles_int)){
                    $temp->delete();
                }
            }
        }
    }

    protected function gender($gender)
    {
        switch(strtolower($gender)){
            case 'm': case 'male': return 1; break;
            case 'f': case 'female': return 2; break;
        }
    }
    protected function department($dept)
    {
        switch(strtolower($dept))
        {
            case 'senior high - day': return 1; break;
            case 'junior high - day': return 2; break;
            case 'senior high - night': return 3; break;
            case 'junior high - night': return 4; break;
        }
    }
    protected function role($role)
    {
        switch(strtolower($role))
        {
            case 'admin': return 1; break;
            case 'adviser': return 2; break;
            case 'subject teacher': return 3; break;
            case 'guidance counselor': return 4; break;
            case 'registrar': return 5; break;
        }
    }
}
