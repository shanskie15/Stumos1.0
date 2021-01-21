<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Borrow extends Model
{
    protected $fillable = [
		'fname',
		'mname',
		'lname',
		'fnamelib',
		'contact',
		'bookname',
		'datetoreturn',
	];
}
