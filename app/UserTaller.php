<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTaller extends Model
{
    protected $table = 'user_tallers';

    protected $fillable = [
        'name', 'last_name', 'email', 'taller_id', 'status'
    ];
}
