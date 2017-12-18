<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogGallery extends Model
{
    //
    protected $fillable = [
        'name', 'url', 'blog_news_id', 'status',
    ];

     public function BlogNews()
    {
        return $this->hasMany('App\BlogNew', 'id', 'blog_news_id');
    }
}
