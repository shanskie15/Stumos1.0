<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    public static $rules = [
        'user_id' => 'required',
        'student_id' => 'required',
        'date' => 'required|date_format:Y-m-d'
    ];

    public function student(){
        return $this->belongsToMany('App\Student');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
