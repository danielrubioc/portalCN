<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','email', 'birth_date', 'status', 'role_id', 'password', 'rut', 'validate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function workshop()
    {
        return $this->belongsToMany('App\Workshop', 'teachers', 'workshop_id', 'teacher_id');

    }

    public function scopeFilterByRequest($query, $column, $value)
    {   
        if (trim($value) != "" && trim($column) != "") {

            switch ($column) {
                case 'full_name':
                    $query->where(\DB::raw("CONCAT(name, '', last_name)"), "LIKE", "%$value%")->orderBy('id','DESC');
                    break;
                case 'email':
                    $query->where(\DB::raw("email"), "LIKE", "%$value%")->orderBy('id','DESC');
                    break;
                case 'status':
                    $query->where(\DB::raw("status"), "LIKE", "%$value%")->orderBy('id','DESC');
                    break;
                case 'role_id':
                    $query->where(\DB::raw("status"), "=", $value)->orderBy('id','DESC');
                    break;
            }
        }

    }


    public function sendPasswordResetNotification($token)
    {
       $this->notify(new CustomResetPasswordNotification($token));
    }

}
