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
            User::create([
                'name' => $row[0],
            ]);
        }
    }
}