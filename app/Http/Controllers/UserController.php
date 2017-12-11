<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;

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
        $users = User::latest()->paginate(5);
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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('users.edit', ['user' => User::findOrFail($id),  'roles' => Role::all(['id', 'name']) ]);

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

        $user = User::find($id); 
        if ($request->password_confirmation == $request->password) {
            if ($user) {

                $user->name = $request->name;
                $user->last_name = $request->last_name;
                //$user->email = $request->email;
                $user->birth_date = $request->birth_date;
                $user->role_id = $request->role_id;
                $user->password = bcrypt($request->password);
                $count = User::where('email', $user->email)->count();

                if ($request->email == $user->email){
                   
                    $user->email = $request->email;   

                } else{
                    echo $count;
                    if ($count<=0) {
                        # code...
                    }
                   
                }
                
                    if ($user->save()) {
                        flash('El usuario '. $user->name .' se actualizó correctamente!')->success();
                        return redirect()->route('users.edit', $user->id);
                    }else
                    {
                         flash('El usuario no se pudo actualizar.')->error();
                         return redirect()->route('users.edit', $user->id);
                    }

                

            }  else{
                
                flash('no se encuentra el usuario')->error();
                return redirect()->route('users.edit', $id);
            }
        } else{
            flash('Contraseñas deben ser iguales')->error();
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
    }
}
