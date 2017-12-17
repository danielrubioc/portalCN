<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogNew extends Model
{
    //
    protected $fillable = [
        'title', 'subtitle', 'content', 'cover_page', 'blog_category_id','status', 'user_id',
    ];


    public function BlogCategory()
    {
        return $this->hasOne('App\BlogCategory', 'id', 'blog_category_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
