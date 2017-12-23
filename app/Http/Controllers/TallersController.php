<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Taller;
use App\UserTaller;
use Auth;


class TallersController extends Controller
{
    //
    public function index(){
        //$tallers = Taller::paginate(15);
        $tallers = Taller::paginate(15);       

        return view('tallers.index', ['tallers' => $tallers]);
    }

    public function create(){
        

        return view('tallers.create', ['profes' => User::all(['id', 'name', 'last_name'])]);
    }

    public function store(Request $request)
    {
        $taller = new Taller( $request->all() );
        $taller->status = 1;
        if ($taller->save()) {
            flash('Taller creado correctamente!')->success();
            return redirect('talleres');
        }else {
            flash('no se pudo crear el Taller')->error();
            return view('talleres.create');
        }
    }
}
