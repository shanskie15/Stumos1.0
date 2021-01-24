<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    protected $fillable = [
        'student_id',
    ];

    public function attendace(){
        return $this->belongsTo('App\Attendance');
    }
}
