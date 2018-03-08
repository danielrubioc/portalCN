<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str as Str;
use App\Http\Requests;
use App\User;
use App\Workshop;
use App\Student;
use App\Teacher;
use App\Lesson;
use App\Status;
use App\Type;
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
        $workshops = Workshop::getListActiveWorkshops(0)->paginate(15);   
        
        return view('workshops.index', ['workshops' => $workshops,
                                         'statuses' => Status::all(['id', 'name']),
                                        'types' => Type::all(['id', 'name']) ]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workshops.create', ['teachers' => User::getListActiveUser(2)->get(),
                                        'types' => Type::all(['id', 'name']),
                                        'statuses' => Status::all(['id', 'name'])]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            'unique'    => ':attribute ya ha sido registrada.',
            'required' => ':attribute es obligatorio',
            'max' => ':attribute no puede ser mayor que :max caracteres',
            'min'      => ':attribute moet minimaal :min karakters bevatten.',
        );
        // validacion segun Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:199',
            'description' => 'required',
            'url' => 'required|max:199|unique:workshops',
            'place' => 'required',
            'cover_page' => 'mimes:jpeg,jpg,png',
            
        ],  $messages);

        if ($validator->fails()) {
            return redirect('posts/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $workshops = new Workshop($request->all());
        $workshops->user_id = Auth::id();
        $workshops->url = Str::slug($request->url ? $request->url : $request->name, '_');
               
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
                $workshops->teachers()->attach($teachers, ['status' => '1']);

            }

            $lastInsertedId = $workshops->id;
            flash('Taller creado correctamente!')->success();
            return redirect()->route('workshops.edit', $workshops->id);

        } else {
            flash('no se pudo crear el Taller')->error();
            return view('workshops.create');
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
            'lessons' => Lesson::all()->where('workshop_id', $id),
            'types' => Type::all(['id', 'name']),
            'statuses' => Status::all(['id', 'name']) ]            
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
        $messages = array(
            'required' => ':attribute es obligatorio',
            'max' => ':attribute no puede ser mayor que :max caracteres',
            'min'      => ':attribute moet minimaal :min karakters bevatten.',
        );
        // validacion segun Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:199',
            'description' => 'required',
            'place' => 'required',
            'cover_page' => 'mimes:jpeg,jpg,png',
            
        ],  $messages);

       
        if ($validator->fails()) {
            return redirect('workshops/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $workshops = Workshop::find($id);
        //si la url es distinta valido que no se repita en bd
        if (($workshops->url != $request->url)) {
            $messages = array(
                'url.unique'    => 'La url ya ha sido registrada.',
                'required' => 'El campo es obligatorio',
            );
            $validRequest = $request->all();
            $validRequest['url'] = Str::slug($validRequest['url'], '_');
            $validator = Validator::make($validRequest, [
                'url' => 'required|string|max:255|unique:workshops',
            ],  $messages);
            if ($validator->fails()) {
                return redirect('workshops/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput();
            }
        }

        if ($workshops) {
            $workshops->name = $request->name ? $request->name : $workshops->name;
            $workshops->subtitle = $request->subtitle ? $request->subtitle : $workshops->subtitle;
            $workshops->url = $request->url ? Str::slug($request->url, '_') : $workshops->url;
            $workshops->description = $request->description ? $request->description : $workshops->description;
            $workshops->quotas = $request->quotas ? $request->quotas : $workshops->quotas;
            $workshops->about_quotas = $request->about_quotas ? $request->about_quotas : $workshops->about_quotas;
            $workshops->status = $request->status ? $request->status : $workshops->status;
            $workshops->type = $request->type ? $request->type : $workshops->type;

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
                if ($request->teachers) {
                    $workshops->teacher()->detach();
                    foreach ($request->teachers as $key => $value) {
                        // si viene un string esto pasa cuando es un nuevo tag 
                        $teachers[$key] = $value;
                    }
                    $workshops->teachers()->attach($teachers, ['status' => '1']);
                }


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


    public function storeStudent(Request $request)
    {
        $workshops = Workshop::find($request->id);

        //dd($workshops->students);

        if ($request->students) {
            foreach ($request->students as $key => $value) {
                // si viene un string esto pasa cuando es un nuevo tag 
                $students[$key] = $value;
            }
            $workshops->students()->attach($students, ['status' => '1']);
        }
    }

    public function registerStudent($id)
    {   

        return view('workshops.register_student', [ 'workshop' => Workshop::findOrFail($id),
                                                    'statuses' => Status::all(['id', 'name']),
                                                    'students' => User::getListActiveUser(3)->get() ]);
    }


    
    
}
