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
        'name', 'last_name','email', 'birth_date', 'status', 'role_id', 'password', 'rut', 'validate', 'age', 'health', 'health_problem', 'school', 'headline_full_name', 'headline_email', 'headline_rut', 'headline_phone',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function hasStatus()
    {
        return $this->hasOne('App\Status', 'id', 'status');
    }

    public function workshops()
    {
        return $this->belongsToMany('App\Workshop', 'students', 'user_id', 'workshop_id')->withPivot('commentary')->withPivot('status')->withTimestamps();

    } 

    public function workshopsOne($id)
    {   
        return $this->belongsToMany('App\Workshop', 'students', 'user_id', 'workshop_id')->where('workshop_id', $id)->first();
    }

    public function workshopsTeacher()
    {
        return $this->belongsToMany('App\Workshop', 'teachers', 'teacher_id', 'workshop_id')->withPivot('status')->withTimestamps();

    }

    public function assistances()
    {
        return $this->belongsToMany('App\Lesson', 'assistances', 'user_id', 'lesson_id')->withPivot('status')->withTimestamps();

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

    public function scopeGetListActiveUser($query, $value)
    {   
        if (!$value) {
            $query->where("status", "=", 1)
              ->orderBy('id','DESC');
        } else {
            $query->where("status", "=", 1)
              ->where('role_id', '=', $value)
              ->orderBy('id','DESC');
        }
        
    }

    //listado de todos los usuarios activos que entran en el rango de edad del taller
    public function scopeGetListActiveUserAgeRange($query, $min, $max)
    {      
        $userToReturn = array();
        $users = $query->where("status", "=", 1)
                ->where('role_id', '=', 3)
                ->orderBy('id','DESC'); 
        foreach ($users->get() as $key => $user) {
            $dob = strtotime(str_replace("/","-",$user->birth_date));       
            $tdate = time();
            $age = 0;
            while( $tdate > $dob = strtotime('+1 year', $dob))
            {
                ++$age;
            }
            if ($age >= $min &&  $age <= $max) {
                array_push($userToReturn, $user);
            }
        }

        return $userToReturn;
        
    }

    //checkea si esta dentro del rango
    public function scopeCheckAge($query, $birth_date)
    {      
        
        $dob = strtotime(str_replace("/","-", $birth_date));       
        $tdate = time();
        $age = 0;
        while( $tdate > $dob = strtotime('+1 year', $dob)){
            ++$age;
        }

        return $age;
        
    }

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new CustomResetPasswordNotification($token));
    }

}
