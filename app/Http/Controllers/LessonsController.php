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
use Image;
use Auth;



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