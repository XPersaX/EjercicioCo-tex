<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;
class RegisteredUserController extends Controller
{
    //Metodo para reistrar un usuario
    function store(Request $request){

        //Validar los datos enviados
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','confirmed',Rules\Password::defaults()],
        ]);

        //Crear el usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return to_route('superadmin.users.index')->with('status','Usuario Regitrado con exito');

    }
}
