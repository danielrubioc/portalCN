<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = [
        'name', 'status', 'url',
    ];

     public function BlogNews()
    {
        return $this->hasOne('App\Post', 'id', 'category_id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tag');
    }

    public function hasStatus()
    {
        return $this->hasOne('App\Status', 'id', 'status');
    }

    public function scopeGetListActiveTags($query)
    {   
        $query->where(\DB::raw("status"), "=", 1);
    }
}
