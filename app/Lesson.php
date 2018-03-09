<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $table= "lessons";
    
    protected $fillable = [
        'description', 'date', 'hour', 'quotas', 'about_quotas', 'workshop_id', 'status'
    ];

    public function users()
    {
    	
        return $this->belongsToMany('App\User', 'assistances', 'lesson_id', 'user_id')->withPivot('status')->withTimestamps();
    }

    public function scopeGetListLessonOrderDate($query)
    {   
        $query->orderBy('date','ASC');
        
    }
    //lista lesson order by date
    public function scopeGetListLessonsOderByDate($query, $value)
    {   
        $query->where('workshop_id', '=', $value)->where('status', '=', 1)->orderBy('date','ASC');
    }


}
