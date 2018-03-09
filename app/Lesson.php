<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $table= "lessons";
    
    protected $fillable = [
        'description', 'date', 'hour', 'quotas', 'about_quotas', 'workshop_id', 'status'
    ];

    public function scopeGetListLessonOrderDate($query)
    {   
        $query->orderBy('date','ASC');
        
    }

    public function users()
    {
    	
        return $this->belongsToMany('App\User', 'assistances', 'lesson_id', 'user_id')->withPivot('status')->withTimestamps();
    }



}
