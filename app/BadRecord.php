<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BadRecord extends Model
{
    protected $fillable = [
        'user_id',
        'section_id',
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
