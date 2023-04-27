<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //se usa para agregar middlewares en el controlador, pero estos generalmente se agregan en las rutas 
    // public function __contruct(){
    //     $this->middleware('auth');
    // }

    public function index(){
        $users = User::latest()->get();
        return view('index', [
                'users' => $users
            ]);
    }

    public function store(UserRequest $request){ //se usa request porque viene del body

        // dd($UserRequest->all()); //para ver todo lo que se envia desde el frontend

        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> bcrypt($request->password),
            ]);
        return back();//metodo back hace que que la ruta retorne la vista anterior despues de guardar el usuario
    }

    public function destroy(User $user){ //se usa el modelo User porque el usuario va a venir por la ruta y la funcion al recibirlo, automaticamente busque ese usuario
        $user->delete();
        return back();
    }
}
