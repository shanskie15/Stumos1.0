<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BadRecord extends Model
{
    protected $fillable = [
        'user_id',
        'student_id',
        'bad_deed',
        'description',
    ];

    public function student(){
        return $this->belongsTo('App\Student', 'student_id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
