<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counselling extends Model
{
    protected $fillable = [
        'user_id',
        'student_id',
        'description',
    ];

    public function student(){
        return $this->belongsTo('App\Student', 'student_id');
    }
    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }
}
