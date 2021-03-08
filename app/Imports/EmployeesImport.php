<?php

namespace App\Imports;

use App\User;
use Auth;
use Throwable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, withHeadingRow, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {
        return new User([
            'firstname' => $row['First Name'],
            'middlename' => $row['Middle Name'],
            'lastname' => $row['Last Name'],
            'email' => $row['Email'],
            'birth_date' => $row['Date of Birth'],
            'contact' => $row['Contact'],
            'address' => $row['Address'],
            'personnel_type' => $row['Personnel Type'],
            'gender' => $row['Gender'],
            'password' =>Hash::make('123456'),
        ]);
    }
    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:users,email']
        ];
    }
}