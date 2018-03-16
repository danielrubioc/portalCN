<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/activacion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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

    public function register(Request $request)
    {   
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function validRut($rut) {
        $rut = $rut; //recibo rut
        $rut_sin_puntos = str_replace('.', "", $rut); //elimino puntos
        $numerosentrada = explode("-", $rut_sin_puntos); //separo rut de dv
        $verificador = $numerosentrada[1]; //asigno valor de dv
        $numeros = strrev($numerosentrada[0]);  //separo rut de dv
        $count = strlen($numeros); //asigno la longitud del string en este caso 8
        $count = $count -1; //resto uno al contador para comenzar mi ciclo ya que las posiciones empiezan de 0
        $suma = 0;
        $recorreString = 0;
        $multiplo = 2;
        for ($i=0; $i <=$count ; $i++) { 
            $resultadoM = $numeros[$recorreString]*$multiplo; // recorro string y multiplico 
            $suma = $suma + $resultadoM; // se suma resultado de multiplicacion por ciclo
            if ($multiplo == 7) { 
                $multiplo = 1;
            }
            $multiplo++;
            $recorreString++;
        }
        $resto = $suma%11;
        $dv= 11-$resto;
        if ($dv == 11) {
            $dv = 0;
        }
        if ($dv == 10) {
            $dv = K;
        }
        if ($verificador == $dv) {
          return true;
        }else {
          return false;
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        // mensajes de validacion
        $messages = array(
            'password.min'    => 'La contraseña debe tener al menos 6 caracteres.',
            'unique'    => 'El :attribute ya ha sido registrado.',
            'required' => 'El :attribute es obligatorio',
            'confirmed' => 'La confirmación de contraseña no coincide',
        );
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rut' => 'required|string|unique:users',
            'age' => 'required',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $data['codigo'] = $this->randomCode();
        $data['nombre'] = $data['name'] . ' ' . $data['last_name'];
        $email = $data['email'];
        if ($this->validRut($data['rut']) == false) {
            
            return redirect('register');
        }

        Mail::send('emails.verify', $data, function($msg) use ($email){
            $msg->subject('Inscripción  - Corporación del Deporte Cerro Navia');
            $msg->from('contacto@deportescerronavia.cl');
            $msg->to($email);
        });

        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'rut' => $data['rut'],
            'email' => $data['email'],
            'status' => 2,
            'role_id' => 3,
            'age' => $data['age'],
            "birth_date" => $data['birth_date'],
            "health" => $data['health'] ? $data['health'] : 0 ,
            "health_problem" => $data['health_problem'],
            "school" => $data['school'],
            "headline_full_name" => $data['headline_full_name'],
            "headline_phone" => $data['headline_phone'],
            "headline_email" => $data['headline_email'],
            "headline_rut" => $data['headline_rut'],
            'validate' => $data['codigo'],
            'password' => bcrypt($data['password']),
        ]);
    }



}
