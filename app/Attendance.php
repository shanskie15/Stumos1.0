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
    public function user(){
        return $this->belongsTo('App\User');
    }
}