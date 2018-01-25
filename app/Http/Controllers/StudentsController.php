<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Workshop;
use App\User;
use App\Student;
use Mail;

class StudentsController extends Controller
{
    public function index(){
        //$tallers = Taller::paginate(15);
        $alumnos = Student::paginate(15);       

        return view('students.index', ['alumnos' => $alumnos]);
    }


    public function create(){
        return view('student.create', ['workshops' => Workshop::all(['id', 'name'])]);
    }

    public function exitoso(){
        return view('student.exitoso', []);
    }

    public function store(Request $request)
    {

        return view('site.workshop_validate_student', [
            'workshop' => Workshop::findOrFail(7), 
            'user' => User::findOrFail(50) ]   
        );

        

        /*
        $usr = $request->all();
        $workshop_id = $usr['workshop_id'];

        unset(  $usr['workshop_id'] );
        $usr['password'] =  '12345';
        $usr['password_confirmation'] =  '12345';
        
        // mensajes de validacion
        $messages = array(
            'password.min'  => 'La contraseña debe tener al menos 6 caracteres.',
            'email.unique'  => 'El email ya ha sido registrado.',
            'required'      => 'El campo es obligatorio',
        );
        // validacion segun Validator
        $validator = Validator::make($usr, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ],  $messages);

        if ($validator->fails()) {
            return redirect('disciplina/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User($usr);
        $user->status = 0;
        $user->role_id = 3;
        $user->password = bcrypt($usr['password']);
        $user->validate = $this->randomCode();
        $count = User::where('email', $user->email)->count();        

        if ($count==0){
            if ($user->save()) {
                $data['codigo'] = $user->validate;
                $data['nombre'] = $user->name . ' ' . $user->last_name;
                $email = $user->email;

                Mail::send('emails.verify', $data, function($msg) use ($email){
                    $msg->subject('Inscripción');
                    $msg->from('cn@portal.com');
                    $msg->to($email);
                });
       
                flash('El usuario se creo correctamente!')->success();
                
                $student = new Student( );
                $student->workshop_id = $workshop_id;
                $student->user_id = $user->id;

                $student->status = 1;
                if ($student->save()) {
                    return view('site.workshop_validate_student', [
                        'workshop' => Workshop::findOrFail($workshop_id), 
                        'user' => User::findOrFail($user->id) ]   
                    );
                }else {
                    flash('Error al registrarse en el curso.')->error();
                }
            }else{
                flash('Disculpa! el usuario no se pudo crear.')->error();
                return view('users.create');
            }
        } else {   
            flash('El email ingresado ya se encuentra en la base de datos!')->error();
            die('2');
            return redirect()->route('users.create');
        }
        */

    }

    public function show( Request $request, $slug )
    {   
        $request = $request->all();

        switch( $slug ){

            case 'verificacion':
                die('verificaicon');
                return view('site.workshop_validate_student', [
                    'workshop' => Workshop::findOrFail($workshop_id), 
                    'user' => User::findOrFail($user->id) ]   
                );
            break;

            case 'exito':
                die('exitoso ctm');
                return view('site.workshop_validate_student', [
                    'workshop' => Workshop::findOrFail($workshop_id), 
                    'user' => User::findOrFail($user->id) ]   
                );
            break;

            default:
                die('404');
            break;
        }
    }

    public function probar( Request $request, $slug )
    {   
        $request = $request->all();

        switch( $slug ){

            case 'verificacion':
                die('verificaicon');
                return view('site.workshop_validate_student', [
                    'workshop' => Workshop::findOrFail($workshop_id), 
                    'user' => User::findOrFail($user->id) ]   
                );
            break;

            case 'exito':
                die('exitoso ctm');
                return view('site.workshop_validate_student', [
                    'workshop' => Workshop::findOrFail($workshop_id), 
                    'user' => User::findOrFail($user->id) ]   
                );
            break;

            default:
                die('404');
            break;
        }
    }

    public function randomCode(){

        $code = '';
        $keys = range('A', 'Z');    
        for ($i = 0; $i < 3; $i++) {
            $code .= $keys[array_rand($keys)];
        }
            
        $keys = range(0, 9);    
        for ($i = 0; $i < 3; $i++) {
            $code .= $keys[array_rand($keys)];
        }

        return $code;
    }

    public function verificacion(Request $request)
    { 
        $rqs = $request->all();

        $validador = User::where([
            'email', '=', $rqs['email'],
            'validate', '=', $rqs['code']
        ])->firstOrFail();

        $validador->status = 1;

        if( $validador->save() ){

            return view('site.workshop_inscripcion_exitosa', [
                'workshop' => Workshop::findOrFail($workshop_id) ] );
                
            die('bkn');

        } else{
            flash('Error al validar')->error();
            die('Error al validar');
            return redirect()->route('users.create');
        }
    }
    
}


