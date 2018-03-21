<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkshopCategories extends Model
{
    //
    protected $fillable = [
        'name', 'status', 'image'
    ];

   
    public function hasStatus()
    {
        return $this->hasOne('App\Status', 'id', 'status');
    }

    public function workshopsFromCategory()
    {
        return $this->hasMany('App\Workshop', 'category_id', 'id');
    }


    //lista de categorias activas
    public function scopeGetListActiveCat($query)
    {   
        $query->where("status", "=", 1)->orderBy('id','DESC');
    }

}
