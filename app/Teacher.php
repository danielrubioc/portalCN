<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $table= "teacher";
    
    protected $fillable = [
        'workshop_id', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function workshop()
    {
        return $this->hasOne('App\Workshop', 'id', 'workshop_id');
    }

}