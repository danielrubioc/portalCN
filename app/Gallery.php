<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = [
        'name', 'url', 'post_id', 'status',
    ];

     public function BlogNews()
    {
        return $this->hasMany('App\BlogNew', 'id', 'post_id');
    }
}
