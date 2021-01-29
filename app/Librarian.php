<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    public static $rules = [
        'user_id' => 'required',
        'student_id' => 'required',
        'date_borrowed' => 'required|date_format:Y-m-d',
        'date_returned' => 'required|date_format:Y-m-d',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function attendace(){
        return $this->belongsTo('App\Attendance');
    }
}
