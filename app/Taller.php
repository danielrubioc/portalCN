<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{

    protected $table= "tallers";
    
    protected $fillable = [
        'name', 'description', 'user_id', 'fecha_inicio', 'fecha_termino', 'horario', 'status'
    ];

}
