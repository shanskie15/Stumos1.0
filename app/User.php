<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'idnumber',
		'email',
		'firstname',
		'middlename',
		'lastname',
		'birth_date',
		'contact',
		'address',
		'personnel_type',
		'password',
        'deleted',
	];

}
