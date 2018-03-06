<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = [
        'title', 'subtitle', 'color', 'subcolor', 'url', 'image', 'status',
    ];

    public function hasStatus()
    {
        return $this->hasOne('App\Status', 'id', 'status');
    }

    public function scopeGetListActiveBanners($query)
    {   
        $query->where(\DB::raw("status"), "=", 1)->orderBy('id','DESC');
    }

}
