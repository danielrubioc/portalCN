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

}
