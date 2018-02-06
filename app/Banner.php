<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = [
        'title', 'subtitle', 'color', 'image', 'status',
    ];

    public function scopeGetListActiveBanners($query)
    {   
        $query->where(\DB::raw("status"), "=", 1)->orderBy('id','DESC');
    }
}
