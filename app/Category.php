<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'status',
    ];

     public function BlogNews()
    {
        return $this->hasOne('App\Post', 'id', 'category_id');
    }

    public function scopeGetListActiveCategories($query)
    {   
        $query->where(\DB::raw("status"), "=", 1);
    }
}
