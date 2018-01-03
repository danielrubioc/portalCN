<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Workshop;
use App\Student;
use App\Teacher;
use Image;
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
        $user = DB::table('users')->where('role_id', 2);
        return view('workshops.create', ['teachers' => User::all(['id', 'name', 'last_name'])]);
    }

    public function store(Request $request)
    {

        $workshops = new Workshop($request->all());
        $workshops->status = 1;
        $workshops->user_id = Auth::id();
       
        
        if( $request->hasFile('cover_page') ) {
            $avatar = $request->file('cover_page');
            $random_string = md5(microtime());
            $filename = time() .'_'. $random_string . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/workshop/' . $filename ) );
            $workshops->cover_page = $filename;
        } 

       
        
        if ($workshops->save()) {
            
            //si vienen los tags
            if ($request->teachers) {
                foreach ($request->teachers as $key => $value) {
                    // si viene un string esto pasa cuando es un nuevo tag 
                    $teachers[$key] = $value;
                }
                $workshops->teacher()->attach($teachers);
            }
            $lastInsertedId = $workshops->id;
            flash('Taller creado correctamente!')->success();
            $tabName = array(
                'name' => 'info',
            );

            return view('workshops.edit', ['workshop' => Workshop::findOrFail($lastInsertedId), 
                                    'tab' => $tabName,
                                    'teachers' => User::all(['id', 'name', 'last_name'])]
                                    );
            
        }else {
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
