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
<<<<<<< HEAD
        'section_id'
=======
        'section_id',
>>>>>>> 0b7138e0f8fa37fdd1b8f9a33cc1fdd684a9d108
    ];

    public function section(){
        return $this->belongsTo('App\Section');
    }
    public function attendace(){
        return $this->belongsTo('App\Attendance');
    }
    public function healthcare(){
        return $this->belongsTo('App\Healthcare');
    }
    public function counselor(){
        return $this->belongsTo('App\Counselor');
    }
    public function librarian(){
        return $this->belongsTo('App\Librarian');
    }
}
