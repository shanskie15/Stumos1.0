<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{
    public static $rules = [
        'user_id' => 'required',
        'student_id' => 'required',
        'date' => 'required|date_format:Y-m-d'
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function attendace(){
        return $this->belongsTo('App\Attendance');
    }
}
