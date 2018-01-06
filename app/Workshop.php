<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{

    protected $table= "workshops";
    
    protected $fillable = [
        'name', 'description', 'user_id', 'status', 'quotas', 'about_quotas', 'cover_page'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function teacher()
    {
    
        return $this->belongsToMany('App\Teacher', 'teachers');
        //return $this->belongsToMany('App\Tag', 'post_tag');
    }


    public function teachers()
    {
        return $this->belongsToMany('App\User', 'teachers', 'workshop_id', 'teacher_id');
    }


    public function scopeFilterByRequest($query, $column, $value)
    {   
        if (trim($value) != "" && trim($column) != "") {

            switch ($column) {
                case 'role_id':
                    $query->where(\DB::raw("role_id"), "=", $value);
                    break;
                case 'email':
                    $query->where(\DB::raw("email"), "LIKE", "%$value%");
                    break;
                case 'status':
                    $query->where(\DB::raw("status"), "LIKE", "%$value%");
                    break;
            }
        }
    }

    public function scopeGetListActiveWorkshops($query)
    {   
        $query->where(\DB::raw("status"), "=", 1);
    }

}


    
