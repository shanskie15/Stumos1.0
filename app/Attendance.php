<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'student_id',
        'date',
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