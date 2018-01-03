<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{

    protected $table= "workshops";
    
    protected $fillable = [
        'name', 'description', 'user_id', 'fecha_inicio', 'fecha_termino', 'horario', 'status'
    ];

}
