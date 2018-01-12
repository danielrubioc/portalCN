<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'subtitle', 'content', 'cover_page', 'category_id', 'status', 'user_id', 'url',
    ];


    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag');
    }

    public function scopeFilterByRequest($query, $column, $value)
    {   

        if (trim($value) != "" && trim($column) != "") {
            switch ($column) {
                case 'title':
                    $query->where(\DB::raw("title"), "LIKE", "%$value%")->where('status', '=', 1)->orderByRaw('created_at DESC');
                    break;
                case 'category':
                    $query->where('category_id', '=', $value)->where('status', '=', 1)->orderByRaw('created_at DESC');
                    break;
                case 'category_get':
                    //recibo la url de categoria y busco todos por categoria id
                    $category = Category::where('url', '=', $value)->first();
                    if ($category) {
                        $query->where('category_id', '=', $category->id)->where('status', '=', 1)->orderByRaw('created_at DESC');
                    }
                    break;
                case 'status':
                    $query->where(\DB::raw("status"), "LIKE", "%$value%")->where('status', '=', 1)->orderByRaw('created_at DESC');
                    break;
            }
        }

    }

    public function scopeGetListActivePost($query)
    {   
        $query->where(\DB::raw("status"), "=", 1);
    }

}
