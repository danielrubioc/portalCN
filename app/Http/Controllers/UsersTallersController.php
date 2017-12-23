<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taller;
use App\UserTaller;

class UsersTallersController extends Controller
{
    public function index(){
        //$tallers = Taller::paginate(15);
        $alumnos = UserTaller::paginate(15);       

        return view('userstallers.index', ['alumnos' => $alumnos]);
    }


    public function create(){
        return view('userstallers.create', ['talleres' => Taller::all(['id', 'name'])]);
    }

    public function exito(){
        return view('userstallers.exito', []);
    }

    public function store(Request $request)
    {
        $usertaller = new UserTaller( $request->all() );
        $usertaller->status = 1;
        if ($usertaller->save()) {
            flash('Alumno registrado correctamente correctamente!')->success();
            return redirect('registro');
        }else {
            flash('no se pudo crear registrar el alumno')->error();
            return view('/');
        }
    }
}
