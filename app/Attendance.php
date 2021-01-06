<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public static $rules = [
        'student_id' => 'required',
        'healthcare_id' => 'required',
        'counselor_id' => 'required',
        'librarian_id' => 'required',
        'date' => 'required|date_format:Y-m-d'
    ];

    public function student(){
        return $this->belongsToMany('App\Student');
    }
    public function healthcare(){
        return $this->belongsToMany('App\Healthcare');
    }
    public function counselor(){
        return $this->belongsToMany('App\Counselor');
    }
    public function librarian(){
        return $this->belongsToMany('App\Librarian');
    }
}