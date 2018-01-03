<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{

    protected $table= "workshops";
    
    protected $fillable = [
        'name', 'description', 'user_id', 'status'
    ];

    public function scopeFilterByRequest($query, $column, $value)
    {   
        if (trim($value) != "" && trim($column) != "") {

            switch ($column) {
                case 'role_id':
                    $query->where(\DB::raw("role_id"), "=", $value);
                    break;
                case 'email':
                    $query->where(\DB::raw("email"), "LIKE", "%$value%");
                    break;
                case 'status':
                    $query->where(\DB::raw("status"), "LIKE", "%$value%");
                    break;
            }
        }
    }

}
