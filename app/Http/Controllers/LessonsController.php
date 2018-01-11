<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Workshop;
use App\Student;
use App\Teacher;
use App\Lesson;
use Image;
use Auth;



class LessonsController extends Controller
{
    //
    public function index(){
        //$tallers = Taller::paginate(15);
        /*
        $workshops = Workshop::paginate(15);       

        return view('workshops.index', ['workshops' => $workshops]);
        */
    }

    public function create(){
        /*
        $user = DB::table('users')->where('role_id', 2);
        return view('workshops.create', ['teachers' => User::all(['id', 'name', 'last_name'])]);
        */
    }

    public function store(Request $request)
    {
        $lessons = new Lesson($request->all());
        $lessons->status = 1;
        $lessons->place = $request->all()['place'];

        if ($lessons->save()) {
            $id = $request->all()['workshop_id'];
            $lastInsertedId = $lessons->id;
            flash('La clase fue creada correctamente!')->success();
            $tabName = array(
                'name' => 'lessons',
            );
           
            return view('workshops.edit', [
                            'workshops' => Workshop::findOrFail( $id ), 
                            'tab' => $tabName,
                            'teachers' => User::all(['id', 'name', 'last_name']),
                            'teachersInWorkshops' => Workshop::findOrFail($request->all()['workshop_id'])->teachers()->get()->toArray(),
                            'lessons' => Lesson::all()->where('workshop_id', $id)
                        ]);
            
        } else {
            flash('no se pudo crear la categoría')->error();
            return view('posts.create');
        }



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