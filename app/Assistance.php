<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{

    protected $fillable = [
        'lesson_id', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function lesson()
    {
        return $this->hasOne('App\Lesson', 'id', 'lesson_id');
    }

}