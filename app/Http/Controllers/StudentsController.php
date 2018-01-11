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
        $usr = $request->all();
        $workshop_id = $usr['workshop_id'];

        unset(  $usr['workshop_id'] );
        $usr['password'] =  '12345';
        $usr['password_confirmation'] =  '12345';
        
        // mensajes de validacion
        $messages = array(
            'password.min'    => 'La contraseña debe tener al menos 6 caracteres.',
            'email.unique'    => 'El email ya ha sido registrado.',
            'required' => 'El campo es obligatorio',
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
                flash('El usuario se creo correctamente!')->success();
                
                /*
                $usrtaller = $request->all();
                $usertaller = new UserTaller( $request->all() );

                $usertaller->status = 1;
                if ($usertaller->save()) {
                    flash('Alumno registrado correctamente correctamente!')->success();
                    return redirect('registro');
                }else {
                    flash('no se pudo crear registrar el alumno')->error();
                    return view('/');
                }
                */
                return view('site.workshop_validate_student', [
                    'workshops' => Workshop::findOrFail($workshop_id), 
                    'user' => User::findOrFail($user->id) ]         
                );

            }else {
                flash('Disculpa! el usuario no se pudo crear.')->error();
                return view('users.create');
            }
        } else {   
            flash('El email ingresado ya se encuentra en la base de datos!')->error();
            return redirect()->route('users.create');
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

    public function student(Request $request)
    { 
        die('jjjj');

        $user = $request->all();
        unset(  $user['taller_id'] );
        $user['password'] =  '12345';
        $user['password_confirmation'] =  '12345';
        $user['rol_id'] = 3;

        // mensajes de validacion
        $messages = array(
            'password.min'    => 'La contraseña debe tener al menos 6 caracteres.',
            'email.unique'    => 'El email ya ha sido registrado.',
            'required' => 'El campo es obligatorio',
        );
        // validacion segun Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],  $messages);

        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $user = new User($request->all());
        if ($request->password_confirmation == $request->password) {
            $user->status = 1;
            $user->password = bcrypt($request->password);
            $count = User::where('email', $user->email)->count();
            //dd($count);

            if ($count==0){                       
                if ($user->save()) {
                    flash('El usuario se creo correctamente!')->success();
                    return redirect('users');
                }else {
                    flash('Disculpa! el usuario no se pudo crear.')->error();
                    return view('users.create');
                }
            } else {   
                flash('El email ingresado ya se encuentra en la base de datos!')->error();
                return redirect()->route('users.create');
            }

        } else{
            flash('Contraseñas deben ser iguales')->error();
            return redirect()->route('users.create');

        }
    }

    public function verificacion(Request $request)
    { 
        die('jjjj');

        $user = $request->all();
        unset(  $user['taller_id'] );
        $user['password'] =  '12345';
        $user['password_confirmation'] =  '12345';
        $user['rol_id'] = 3;

        // mensajes de validacion
        $messages = array(
            'password.min'    => 'La contraseña debe tener al menos 6 caracteres.',
            'email.unique'    => 'El email ya ha sido registrado.',
            'required' => 'El campo es obligatorio',
        );
        // validacion segun Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],  $messages);

        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $user = new User($request->all());
        if ($request->password_confirmation == $request->password) {
            $user->status = 1;
            $user->password = bcrypt($request->password);
            $count = User::where('email', $user->email)->count();
            //dd($count);

            if ($count==0){                       
                if ($user->save()) {
                    flash('El usuario se creo correctamente!')->success();
                    return redirect('users');
                }else {
                    flash('Disculpa! el usuario no se pudo crear.')->error();
                    return view('users.create');
                }
            } else {   
                flash('El email ingresado ya se encuentra en la base de datos!')->error();
                return redirect()->route('users.create');
            }

        } else{
            flash('Contraseñas deben ser iguales')->error();
            return redirect()->route('users.create');

        }
    }
}
