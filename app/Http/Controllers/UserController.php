<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $users = User::paginate(15);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create', ['roles' => Role::all(['id', 'name'])]);

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
        //

        return view('users.edit', ['user' => User::findOrFail($id),  
                                   'roles' => Role::all(['id', 'name']) ]);

    }

    public function profile()
    {
        //

        return view('users.profile', ['user' => Auth::user(), 'roles' => Role::all(['id', 'name']) ]);

    }

    public function update_avatar(Request $request){

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $profile=null)
    {

        $user = User::find($id); 
        if ($request->password_confirmation == $request->password) {
            if ($user) {
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->birth_date = $request->birth_date ? $request->birth_date : $user->birth_date;
                $user->role_id = $request->role_id ? $request->role_id : $user->role_id;
                $user->status = $request->status ? $request->status : $user->status;
                print_r($user->status);
                die();
                $user->password = $request->password ? bcrypt($request->password) : $user->password;
                $user->referential_info = $request->referential_info ? $request->referential_info : $user->referential_info;

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
}
