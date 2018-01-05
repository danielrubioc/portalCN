<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $table= "lessons";
    
    protected $fillable = [
        'description', 'date', 'hour', 'quotas', 'about_quotas', 'workshop_id', 'status'
    ];

}
