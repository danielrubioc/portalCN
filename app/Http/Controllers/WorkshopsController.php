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

class WorkshopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tallers = Taller::paginate(15);
        $workshops = Workshop::paginate(15);       
        
        return view('workshops.index', ['workshops' => $workshops]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('users')->where('role_id', 2);
        return view('workshops.create', ['teachers' => User::all(['id', 'name', 'last_name'])]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            flash('Taller creado correctamente! Continua agregando el horario y fecha de las clases para este taller.')->success();
            $tabName = array(
                'name' => 'lessons',
            );

            return view('workshops.edit', [
                'workshops' => Workshop::findOrFail($lastInsertedId), 
                'tab' => $tabName,
                'all_teachers' => User::all(['id', 'name', 'last_name']),
                'teachers' => User::all(['id', 'name', 'last_name']),
                'teachersInWorkshops' => Workshop::findOrFail($lastInsertedId)->teachers()->get()->toArray(),
                'lessons' => Lesson::all()->where('workshop_id', $lastInsertedId) ]
            );

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {   
        
        $workshop = Workshop::where('url', '=', $slug)->firstOrFail();
        
        if( !empty( $workshop->id ) ){
            return view('site.workshop', [
                    'workshop' => $workshop
                ]
            );
        }else{
            die("No existe la disciplina $slug");
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //esto es para actvivar el tab en info
        $tabName = array(
            'name' => 'info',
        );

        return view('workshops.edit', [
            'workshops' => Workshop::findOrFail($id), 
            'tab' => $tabName,
            'all_teachers' => User::all(['id', 'name', 'last_name']),
            'teachers' => User::all(['id', 'name', 'last_name']),
            'teachersInWorkshops' => Workshop::findOrFail($id)->teachers()->get()->toArray(),
            'lessons' => Lesson::all()->where('workshop_id', $id) ]            
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $workshops = Workshop::find($id);
        if ($workshops) {
            $workshops->name = $request->name ? $request->name : $workshops->name;
            $workshops->subtitle = $request->subtitle ? $request->subtitle : $workshops->subtitle;
            $workshops->url = $request->url ? $request->url : $workshops->url;
            $workshops->description = $request->description ? $request->description : $workshops->description;
            $workshops->quotas = $request->quotas ? $request->quotas : $workshops->quotas;
            $workshops->about_quotas = $request->about_quotas ? $request->about_quotas : $workshops->about_quotas;
            $workshops->status = $request->status ? $request->status : 1;

            //viene una imagen nueva
            if ($request->cover_page) {
                if ( file_exists(public_path() . "/uploads/workshop/$workshops->cover_page" ) ) {
                    unlink(public_path() .  "/uploads/workshop/$workshops->cover_page" );
                }
                $cover_page = $request->file('cover_page');
                $random_string = md5(microtime());
                $filename = time() .'_'. $random_string . '.' . $cover_page->getClientOriginalExtension();
                Image::make($cover_page)->save( public_path('/uploads/workshop/' . $filename ) );
                $workshops->cover_page = $filename;
            
            } else {
                $workshops->cover_page = $workshops->cover_page; 
            }
            
            if ($workshops->save()) {

                //si vienen los tags
                /*if ($request->teachers) {
                    foreach ($request->teachers as $key => $value) {
                        // si viene un string esto pasa cuando es un nuevo tag 
                        if(is_numeric($value) == false) {
                            //busco por nombre los tags que vienen
                            $teacher = Teacher::firstOrNew(['name' => $value]);
                            //si no existe lo creo
                            if (!$tag->exists) {
                                $tag = new Tag();
                                $tag->status = 1;
                                $tag->name = $value;
                                $tag->save();
                                // agrego el id al arreglo $tags
                                $tags[$key] = $tag->id;
                            } 
                        } else {
                            $tags[$key] = $value;  
                        }

                    }
                    $news->tags()->detach();
                    $news->tags()->attach($tags);
                }*/

                if ($request->show) {
                    flash('La noticia '. $workshops->title .' se actualizó correctamente!')->success();
                    return redirect()->route('workshops.index');
                }
                

                flash('La noticia '. $workshops->title .' se actualizó correctamente!')->success();
                return redirect()->route('workshops.edit', $workshops->id);

            } else {
                flash('La noticia no se pudo actualizar.')->error();
                return redirect()->route('workshops.edit', $workshops->id);
            }
            
        }  else{
            
            flash('no se encuentra la noticia')->error();
            return redirect()->route('workshops.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workshops = Workshop::find($id);
        if ($workshops->delete()) {
            if ($workshops->cover_page) {
                if ( file_exists(public_path() . "/uploads/workshop/$workshops->cover_page" ) ) {
                    unlink(public_path() .  "/uploads/workshop/$workshops->cover_page" );
                }
            }
            flash('Taller eliminado correctamente!')->success();
            return redirect('workshops');
        } else{
            flash('No se pudo eliminar el workshop!')->error();   
            return redirect('workshop');
        }
    }

    
    
}
