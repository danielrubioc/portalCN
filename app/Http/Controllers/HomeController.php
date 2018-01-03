<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Gallery;
use App\Tag;
use App\User;
use App\Workshop;
use App\Student;
use App\Teacher;
use Auth;
use Image;


class HomeController extends Controller
{
    //iran todo las views del sitio publico
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // vista para los admins
    public function index()
    {
        return view('dashboard_admin');
    }

    // vista para los profes
    public function indexTeacher()
    {   
        $workshops = Workshop::getListActiveWorkshops()->paginate(15); 
        return view('dashboard_teacher', ['workshops' => $workshops]);
    }

    // vista para los alumnos
    public function indexPublic()
    {   
        //lista de talleres activos
        $workshops = Workshop::getListActiveWorkshops()->paginate(15); 
        return view('dashboard_public', ['workshops' => $workshops]);
    }
    
    public function indexSite()
    {   
        return view('site/home');
    }


    public function about()
    {
        return view('site/about');
    }

    
}
