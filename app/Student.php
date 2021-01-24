<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'year',
        'address',
        'birthdate',
        'gender',
        'contact',
        'parent_name',
        'pcontact',
        'section_id',
    ];

    public function section(){
        return $this->belongsTo('App\Section');
    }
    public function attendace(){
        return $this->belongsTo('App\Attendance');
    }
}

