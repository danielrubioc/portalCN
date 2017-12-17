<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    //
    protected $fillable = [
        'name', 'status',
    ];

     public function BlogNews()
    {
        return $this->hasMany('App\BlogNew', 'id', 'blog_category_id');
    }
}
