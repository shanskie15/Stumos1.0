<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static $rules = [
		'email' => 'sometimes|required|email|unique:clients,email|unique:employees,email',
		'firstname' => 'required',
		'middlename' => 'required',
		'lastname' => 'required',
		'birth_date' => 'required|date_format:Y-m-d',
		'contact' => 'sometimes|required|numeric|digits:11|unique:clients,contact|unique:employees,contact',
        'address' => 'required',
        'password' => 'required',
		'personnel_type' => 'required'
  ];
}
