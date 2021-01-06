<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'section_name', 
        'room_number', 
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function student(){ 
        return $this->belongsToMany('App\Student');
    }
}
