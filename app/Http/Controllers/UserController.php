<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Status;
use App\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Image;
use Mail;
use Excel;
use Input;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        if ($request->has('name')) {
            $column = "full_name";
            $users = User::filterByRequest($column, $request->get('name'))->paginate();
        } else if ($request->has('email')) {
            $column = "email";
            $users = User::filterByRequest($column, $request->get('email'))->paginate();
        } else if ($request->has('status')) {
            $column = "status";
            $users = User::filterByRequest($column, $request->get('status'))->paginate();
        } else {
            $users = User::orderBy('id', 'desc')->paginate(15);
        }

        if ($request->session()->exists('users')) {
            //
        }
        return view('users.index', ['users' => $users, 
                                    'statuses' => Status::all(['id', 'name']) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create', ['roles' => Role::all(['id', 'name']), 'statuses' => Status::all(['id', 'name'])]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // mensajes de validacion
        $messages = array(
            'password.min'    => 'La contraseña debe tener al menos 6 caracteres.',
            'unique'    => 'El :attribute ya ha sido registrado.',
            'required' => 'El :attribute es obligatorio',
        );
        // validacion segun Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'rut' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],  $messages);

        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        
        $user = new User($request->all());



        if ($request->password_confirmation == $request->password) {
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

    public function export() 
    {
        $users = User::get()->toArray();
        $roles = Role::get()->toArray();
        $usersReturns = [];
         
        foreach ($users as $key => $user) {
            $usersReturns[$key]['id'] = $user['id'];
            $usersReturns[$key]['name'] = $user['name'];
            $usersReturns[$key]['last_name'] = $user['last_name'];
            $usersReturns[$key]['email'] = $user['email'];
            $usersReturns[$key]['rut'] = $user['rut'];
            $usersReturns[$key]['birth_date'] = $user['birth_date'];
            $usersReturns[$key]['age'] = $user['age'];
            $usersReturns[$key]['address'] = $user['address'];
            $usersReturns[$key]['phone'] = $user['phone'];
            $usersReturns[$key]['cell_phone'] = $user['cell_phone'];
            $usersReturns[$key]['school'] = $user['school'];
            $usersReturns[$key]['health'] = $user['health'];
            $usersReturns[$key]['health_problem'] = $user['health_problem'];
            $usersReturns[$key]['headline_full_name'] = $user['headline_full_name'];
            $usersReturns[$key]['headline_email'] = $user['headline_email'];
            $usersReturns[$key]['headline_phone'] = $user['headline_phone'];
            $usersReturns[$key]['headline_rut'] = $user['headline_rut'];
            $usersReturns[$key]['status'] = $user['status'];
            $usersReturns[$key]['created_at'] = $user['created_at'];
            $usersReturns[$key]['updated_at'] = $user['updated_at'];

            foreach ($roles as $e => $rol) {
                if ($rol['id'] == $user['role_id']) {
                    $usersReturns[$key]['rol'] = $rol['name'];
                }
            }
        }
        
        return Excel::create('usuarios', function($excel) use ($usersReturns) {
            $excel->sheet('Listado', function($sheet) use ($usersReturns)
            {
                $sheet->fromArray($usersReturns);
            });
        })->download('xls');
    }

 

    public function import(Request $request) 
    {   
        $error_users= [];
        $correct_users= [];
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    //'name', 'last_name','email',  'status', 'role_id', 'password', 'rut', 'validate', 'age', 'health', 'health_problem', 'school', 'headline_full_name', 'headline_email', 'headline_rut', 'headline_phone',
                    //rol usuario
                    switch ($value->rol) {
                        case 'teacher':
                            $value->role_id = 2;
                            break;
                        case 'public':
                            $value->role_id = 3;
                            break;
                        case 'publisher':
                            $value->role_id = 4;
                            break;
                        case 'atencion':
                            $value->role_id = 5;
                            break;    
                    }

                    $insert[$key] = [
                            'name' => $value->name, 
                            'last_name' => $value->last_name,
                            'email' => $value->email,
                            'status' => 1,
                            'role_id' => 3,
                            'password' => bcrypt($value->password),
                            'phone' => $value->phone,
                            'cell_phone' => $value->cell_phone,
                            'age' => $value->age,
                            'birth_date' => $value->birth_date,
                            'address' => $value->address,
                            'rut' => $value->rut,
                            'health' => ($value->health == 'si') ? 1 : 0,
                            'health_problem' => $value->health_problem,
                            'school' => $value->school,
                            'headline_full_name' => $value->headline_full_name,
                            'headline_email' => $value->headline_email,
                            'headline_phone' => $value->headline_phone,
                            'headline_rut' => $value->headline_rut,
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
                        'name' => 'required|string|max:190',
                        'last_name' => 'max:190',
                        'last_name' => 'max:190',
                        'address' => 'max:190',
                        'email' => 'required|string|email|max:255|unique:users',
                        'rut' => 'required|string|max:255|unique:users',
                        'password' => 'required|string|min:6',
                    ], $messages);
                    $user = new User($insert[$key]);
                    if ($validator->fails()) {
                        $error_users[$key]['name'] = $insert[$key]['name']; 
                        $error_users[$key]['last_name'] = $insert[$key]['name'];
                        $error_users[$key]['email'] = $insert[$key]['email'];
                        $error_users[$key]['rut'] = $insert[$key]['rut'];
                        $error_users[$key]['observación'] = $validator->messages()->toJson();
                    } else {
                        $user->save();
                        $correct_users[$key] = $insert[$key];
                    }
                }
 
                if ($error_users) {
                    //flash( count($error_users). ' registros no se pudieron crear, revisa los datos del archivo.'. ' <a data-toggle="modal" data-target="#errorsUser" class="btn btn-success alert-danger" style="    background: #d9534f;">Ver errores <i class="fa fa-plus-circle" aria-hidden="true"></i></a>    ' )->error();   
                    foreach ($error_users as $key => $value) {
                        flash( '"'.$value['name']. $value['last_name'].'" no se pudo crear usuario. <br> Observación: ' .$value['observación'] )->error();   

                    }
 

                }
                if ($correct_users) {
                    flash('Se crearon ' . count($correct_users). ' usuarios')->success();
                }
                /*return view('users.index', ['users' => User::orderBy('id', 'desc')->paginate(15), 
                                    'statuses' => Status::all(['id', 'name']),
                                     ]);
                */
                return redirect('/users');
            

            }
        }
    }

     public function importUpdate(Request $request) 
    {   
        $error_users= [];
        $correct_users= [];
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    //'name', 'last_name','email',  'status', 'role_id', 'password', 'rut', 'validate', 'age', 'health', 'health_problem', 'school', 'headline_full_name', 'headline_email', 'headline_rut', 'headline_phone',
                    //rol usuario
                    switch ($value->rol) {
                        case 'teacher':
                            $value->role_id = 2;
                            break;
                        case 'public':
                            $value->role_id = 3;
                            break;
                        case 'publisher':
                            $value->role_id = 4;
                            break;
                        case 'atencion':
                            $value->role_id = 5;
                            break;    
                    }


                    $user = User::find($value->id); 
 
                    if ($user) {


                        $insert[$key] = [
                            'name' => $value->name, 
                            'last_name' => $value->last_name,
                            'email' => $value->email,
                            'status' => $value->status,
                            'role_id' => $value->role_id ? $value->role_id : $user->role_id,
                            'phone' => $value->phone ? $value->phone : $user->phone,
                            'cell_phone' => $value->cell_phone ? $value->cell_phone : $user->cell_phone,
                            'age' => $value->age ? $value->age : $user->age,
                            'birth_date' => $value->birth_date ? $value->birth_date : $user->birth_date,
                            'address' => $value->address ? $value->address : $user->address,
                            'rut' => $value->rut ? $value->rut : $user->rut,
                            'health' => ($value->health == 'si') ? 1 : 0,
                            'health_problem' => $value->rut ? $value->rut : $user->rut,
                            'school' => $value->school ? $value->school : $user->school,
                            'headline_full_name' => $value->headline_full_name ? $value->headline_full_name : $user->headline_full_name,
                            'headline_email' => $value->headline_email ? $value->headline_email : $user->headline_email,
                            'headline_phone' => $value->headline_phone ? $value->headline_phone : $user->headline_phone,
                            'headline_rut' => $value->headline_rut ? $value->headline_rut : $user->headline_rut,
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
                            'name' => 'required|string|max:190',
                            'last_name' => 'max:190',
                            'last_name' => 'max:190',
                            'address' => 'max:190',
                            'email' => 'required|string|email|max:255|unique:users,id,'. $user->id,
                            'rut' => 'required|string|max:255|unique:users,id,'. $user->id
                         ], $messages);

                         if ($validator->fails()) {
                            $error_users[$key]['name'] = $insert[$key]['name']; 
                            $error_users[$key]['last_name'] = $insert[$key]['name'];
                            $error_users[$key]['email'] = $insert[$key]['email'];
                            $error_users[$key]['rut'] = $insert[$key]['rut'];
                            $error_users[$key]['observación'] = $validator->messages()->toJson();
                        } else {
                            $user->fill($insert[$key]);

                            $user->save();
                             
                        }

                    }
 
 
                }
                return redirect('/users');

            }
        }
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        return view('users.edit', ['user' => User::findOrFail($id),  
                                   'roles' => Role::all(['id', 'name']),
                                   'statuses' => Status::all(['id', 'name']) ]);

    }

    public function profile()
    {

        return view('users.profile', [  'user' => Auth::user(), 
                                        'roles' => Role::all(['id', 'name']), 
                                        'statuses' => Status::all(['id', 'name']) ]);
    }

    public function update_profile(Request $request)
    {   

        $user = Auth::user();
        if ($request->password_confirmation == $request->password) {
            if ($user) {
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->birth_date = $request->birth_date ? $request->birth_date : $user->birth_date;
                $user->role_id = $request->role_id ? $request->role_id : $user->role_id;
                $user->status = $request->status ? $request->status : $user->status;
                $user->address = $request->address ? $request->address : $user->address;
                $user->phone = $request->phone ? $request->phone : $user->phone; 
                $user->cell_phone = $request->cell_phone ? $request->cell_phone : $user->cell_phone;
                $user->password = $request->password ? bcrypt($request->password) : $user->password;
                $user->referential_info = $request->referential_info ? $request->referential_info : $user->referential_info;
                $user->rut = $request->rut ? $request->rut : $user->rut;


                if ($request->email == $user->email){
                    $user->email = $request->email;   
                } else{

                    $count = User::where('email', $request->email)->count();
                    if ($count>0) {
                        flash('el correo ingresado ya se encuentra registrado')->error();
                        if ($request->profile) {
                            return view('users.profile', ['user' => Auth::user() ]);
                        }
                        return redirect()->route('users.edit', $user->id);
                    } else {  
                        $user->email = $request->email;   
                    }
                   
                }
                
                if ($user->save()) {
                    flash('El usuario '. $user->name .' se actualizó correctamente!')->success();
                    if ($request->profile) {
                        return view('users.profile', ['user' => Auth::user() ]);
                    }
                    return redirect()->route('users.edit', $user->id);
                } else {
                    flash('El usuario no se pudo actualizar.')->error();
                    if ($request->profile) {
                        return view('users.profile', ['user' => Auth::user() ]);
                    }
                    return redirect()->route('users.edit', $user->id);
                }

                

            }  else {
                
                flash('no se encuentra el usuario')->error();
                if ($request->profile) {
                    return view('users.profile', ['user' => Auth::user() ]);
                }
                return redirect()->route('users.edit', $id);
            }
        } else{
            flash('Contraseñas deben ser iguales')->error();
            if ($request->profile) {
               return view('users.profile', ['user' => Auth::user() ]);
            }
            return redirect()->route('users.edit', $id);

        }
        

    }

    public function update_avatar(Request $request){
        $messages = array('mimes'    => ':attribute sólo acepta jpeg,jpg,png.');
        // validacion segun Validator
        $validator = Validator::make($request->all(), [ 'avatar' => 'mimes:jpeg,jpg,png' ],  $messages);
        if ($validator->fails()) {
            return redirect('/profile/show')->withErrors($validator)->withInput();
        }
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('users.profile', ['user' => Auth::user(), 'roles' => Role::all(['id', 'name']) ]);

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


    public function registerUserAndWorkshop(Request $request)
    { 

        // mensajes de validacion
        $messages = array(
            'password.min'    => 'La contraseña debe tener al menos 6 caracteres.',
            'unique'    => 'El :attribute ya ha sido registrado.',
            'required' => 'El campo es obligatorio',
        );
        // validacion segun Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'rut' => 'required|string|max:255|unique:users',
            'g-recaptcha-response' => 'required|captcha',
            'password' => 'required|string|min:6|confirmed',
        ],  $messages);

        if ($validator->fails()) {

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $workshop = Workshop::findOrFail($request->workshop_id);

        $dob = strtotime(str_replace("/","-", $request->birth_date));       
        $tdate = time();
        $age = 0;
        while( $tdate > $dob = strtotime('+1 year', $dob)){
            ++$age;
        }

        $user = new User($request->all());
        if ($request->password_confirmation == $request->password) {
            $user->status = 1;
            $user->role_id = 3;
            $user->password = bcrypt($request->password);
            $count = User::where('email', $user->email)->count();
            //dd($count);

            if ($count==0){                       
                if ($user->save()) {

                    $data['codigo'] = $this->randomCode();
                    $data['nombre'] = $request->name . ' ' . $request->last_name;
                    $email = $request->email;

                    /*
                    Mail::send('emails.verify', $data, function($msg) use ($email){
                        $msg->subject('Inscripción  - Corporación del Deporte Cerro Navia');
                        $msg->from('contacto@deportescerronavia.cl');
                        $msg->to($email);
                    });
                    */
                    $user->validate = $data['codigo'];
                    if ($user->save()) {
                        if ($age >= $workshop->age_min  && $age <= $workshop->age_max ) {
                            $user->workshops()->attach($workshop->id, ['status' => '1' , 'commentary' => $request->commentary]);
                            flash('El usuario se creo correctamente! gracias por registrarte en el Taller "'. $workshop->name .'" . Ahora puedes iniciar sesión')->success();
                        } else {
                            flash('El usuario se creo correctamente! pero no pudiste registrarte en el taller "'. $workshop->name .'" por no cumplir con el rango de edad necesario. Ahora puedes iniciar sesión')->success();
                        }
                    
                    }

                    return redirect()->route('login');
                    
                }else {
                    flash('Disculpa! el usuario no se pudo crear.')->error();
                    return redirect()->back();
                }
            } else {   
                flash('El email ingresado ya se encuentra en la base de datos!')->error();
                return redirect()->back();
            }

        } else{
            flash('Contraseñas deben ser iguales')->error();
            return redirect()->back();

        }
    }


    public function update(Request $request, $id)
    {   

        
        $user = User::find($id); 
        if ($request->password_confirmation == $request->password) {
            if ($user) {
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->birth_date = $request->birth_date ? $request->birth_date : $user->birth_date;
                $user->role_id = $request->role_id ? $request->role_id : $user->role_id;
                $user->status = $request->status ? $request->status : $user->status;
                $user->address = $request->address ? $request->address : $user->address;
                $user->phone = $request->phone ? $request->phone : $user->phone; 
                $user->cell_phone = $request->cell_phone ? $request->cell_phone : $user->cell_phone;
                $user->password = $request->password ? bcrypt($request->password) : $user->password;
                $user->referential_info = $request->referential_info ? $request->referential_info : $user->referential_info;
                $user->age = $request->age ? $request->age : $user->age;
                $user->school = $request->school ? $request->school : $user->school;
                $user->health = isset($request->health) ? $request->health : $user->health;
                
                $user->health_problem = $request->health_problem ? $request->health_problem : $user->health_problem;
                $user->headline_full_name = $request->headline_full_name ? $request->headline_full_name : $user->headline_full_name;
                $user->headline_email = $request->headline_email ? $request->headline_email : $user->headline_email;
                $user->headline_phone = $request->headline_phone ? $request->headline_phone : $user->headline_phone;
                $user->headline_rut = $request->headline_rut ? $request->headline_rut : $user->headline_rut;


                if ($request->email == $user->email){
                    $user->email = $request->email;   
                } else{

                    $count = User::where('email', $request->email)->count();
                    if ($count>0) {
                        flash('el correo ingresado ya se encuentra registrado')->error();
                        if ($request->profile) {
                            return view('users.profile', ['user' => Auth::user() ]);
                        }
                        return redirect()->route('users.edit', $user->id);
                    } else {  
                        $user->email = $request->email;   
                    }
                   
                }
                
                if ($user->save()) {
                    flash('El usuario '. $user->name .' se actualizó correctamente!')->success();
                    if ($request->profile) {
                        return view('users.profile', ['user' => Auth::user() ]);
                    }
                    return redirect()->route('users.edit', $user->id);
                } else {
                    flash('El usuario no se pudo actualizar.')->error();
                    if ($request->profile) {
                        return view('users.profile', ['user' => Auth::user() ]);
                    }
                    return redirect()->route('users.edit', $user->id);
                }

                

            }  else {
                
                flash('no se encuentra el usuario')->error();
                if ($request->profile) {
                    return view('users.profile', ['user' => Auth::user() ]);
                }
                return redirect()->route('users.edit', $id);
            }
        } else{
            flash('Contraseñas deben ser iguales')->error();
            if ($request->profile) {
               return view('users.profile', ['user' => Auth::user() ]);
            }
            return redirect()->route('users.edit', $id);

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
        //
        $user = User::find($id);
        if ($user->delete()) {
            flash('Usuario eliminado correctamente!')->success();
            return redirect('users');
        } else{
            flash('No se pudo eliminar el usuario!')->error();   
            return redirect('users');
        }
    }


    public function calculateAge($birthdayDate){
        //replace / with - so strtotime works
        $dob = strtotime(str_replace("/","-",$birthdayDate));       
        $tdate = time();

        $age = 0;
        while( $tdate > $dob = strtotime('+1 year', $dob))
        {
            ++$age;
        }
        return $age;
    }
}
