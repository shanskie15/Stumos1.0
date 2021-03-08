<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CounselorCreate extends Model
{
    protected $fillable = [
        'user_id',
        'student_id',
        'type',
        'bad_deed',
        'description',
    ];

    public function student(){
        return $this->belongsTo('App\Student');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
