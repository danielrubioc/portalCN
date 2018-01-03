<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Workshop;
use App\Student;
use App\Teacher;
use Auth;


class WorkshopsController extends Controller
{
    //
    public function index(){
        //$tallers = Taller::paginate(15);
        $workshops = Workshop::paginate(15);       

        return view('workshops.index', ['workshops' => $workshops]);
    }

    public function create(){
        
        return view('workshops.create', ['teachers' => User::all(['id', 'name', 'last_name'])]);
    }

    public function store(Request $request)
    {
        die('test');

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
