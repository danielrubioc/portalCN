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
use App\Status;
use App\Type;
use App\Assistance;
use Illuminate\Support\Facades\Validator;
use Image;
use Auth;
use Excel;
use Input;
use Carbon\Carbon; 


class LessonsController extends Controller
{

    public function store(Request $request)
    {   
        $lessons = new Lesson($request->all());
        $lessons->status = 1;
        $lessons->place = $request->place;      
        if ($lessons->save()) {
            flash('La clase fue creada correctamente!')->success();
           
            return redirect()->route('lessons.listLesson', $request->workshop_id);
        } else {
            flash('no se pudo crear la clase')->error();
            return redirect()->route('lessons.listLesson', $request->workshop_id);
        }
    }

    public function list($id){
        return view('talleres.list', [
            'lessons' => Lesson::all()->where('id', $id)
        ]);
    } 

    public function listAssistance($id){
        $studentToAsisstance = [];
        $lesson = Lesson::find($id);
        $workshop = Workshop::find($lesson->workshop_id);
        //creo registro de asistencia -- lista de usuarios
        $students = $workshop->students;
        foreach ($students as $key => $student) {
            
            $lessons = Assistance::all()->where('lesson_id', $lesson->id)->where('user_id', $student->id);
            //si no hay usuario registrado en assistencias
            if (count($lessons) == 0) {
                array_push($studentToAsisstance, $student);
            }
        }   
        
        foreach ($studentToAsisstance as $key => $studentIn) {
            //$lesson->users()->attach($workshop->students, ['status' => '1']);
            $lesson->users()->attach($studentIn, ['status' => '1']); //almaceno en tabla pivot 
        }
        $lessons = Assistance::all()->where('lesson_id', $lesson->id);
        return view('workshops.list_assistance', [  'lessons' => $lessons, 
                                                    'workshop' => $workshop, 
                                                    'lesson' => $lesson ]);
    }

    public function saveList(Request $request){

        foreach ($request->status as $key => $value) {
            $user = User::find($value['user']);

            $class = $user->assistances()->where('lesson_id', $request->lesson_id)->get()->first();    
            $class->pivot->status = $value['status'];
            $class->pivot->save();
        }
        flash('Lista guardada correctamente!')->success();
        return redirect()->route('lessons.listLesson', $request->wk_id);
    }

    public function listLesson($id)
    {   
        $workshops = Workshop::find($id);
        if ($workshops) {   
            return view('workshops.list_lessons', [ 'workshops' => $workshops,
                                                    'lessons' => Lesson::getListLessonsOderByDate($workshops->id)->get() ]);
        }
    }

    public function import(Request $request) 
    {   
        $erros_lesson= [];
        $correct_lesson= [];
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                
                foreach ($data as $key => $value) {
                    //'name', 'last_name','email',  'status', 'role_id', 'password', 'rut', 'validate', 'age', 'health', 'health_problem', 'school', 'headline_full_name', 'headline_email', 'headline_rut', 'headline_phone',
                    //rol usuario
                    $insert[$key] = [
                            'place' => $value->lugar, 
                            'date' => Carbon::createFromFormat('Y-m-d H:i:s', $value->fecha)->format('Y-m-d H:i:s'),
                            'hour' => Carbon::createFromFormat('Y-m-d H:i:s', $value->hora)->format('H:i'),
                            'description' => $value->descripcion,
                            'status' => 1,
                            'workshop_id' => $request->id,
                    ];
                     //validacion

                    $messages = array(
                        'password.min'    => 'La contraseña debe tener al menos 6 caracteres.',
                        'unique'    => 'El :attribute ya ha sido registrado.',
                        'required' => 'El :attribute es obligatorio',
                        'email' => 'El correo electronico debe ser una direccion de correo electronico valida',
                        'max' => 'Supera los caracteres permitidos',
                    ); 
                    $validator = Validator::make($insert[$key], [
                        'place' => 'required|string|max:190',
                        'date' => 'required|date_format:Y-m-d H:i:s',
                        'hour' => 'required|date_format:H:i',
                        'description' => 'required',
                    ], $messages);

                    $lesson = new Lesson($insert[$key]);
                    if ($validator->fails()) {
                        $erros_lesson[$key]['place'] = $insert[$key]['place']; 
                        $erros_lesson[$key]['date'] = $insert[$key]['date'];
                        $erros_lesson[$key]['hour'] = $insert[$key]['hour'];
                        $erros_lesson[$key]['description'] = $insert[$key]['description'];
                        //print_r($erros_lesson); die();
                    } else {
                        $lesson->save();
                        $correct_lesson[$key] = $insert[$key];
                    }
                }
 
                if ($erros_lesson) {
                    flash( count($erros_lesson). ' registros no se pudieron crear, revisa los datos del archivo.'. ' <a data-toggle="modal" data-target="#errorsUser" class="btn btn-success alert-danger" style="    background: #d9534f;">Ver errores <i class="fa fa-plus-circle" aria-hidden="true"></i></a>    ' )->error();   
                    session(['erros_lesson' => $erros_lesson]);
                }
                if ($correct_lesson) {
                    flash('Se crearon ' . count($correct_lesson). ' clases')->success();
                }
                return redirect()->route('lessons.listLesson', $request->id);

            }
        }
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        if ($lesson->delete()) {
            flash('Clase eliminada correctamente!')->success();
            return redirect()->route('lessons.listLesson', $lesson->workshop_id);
        } else{
            flash('No se pudo eliminar la clase!')->error();   
            return redirect()->route('lessons.listLesson', $lesson->workshop_id);
        }
    }

}