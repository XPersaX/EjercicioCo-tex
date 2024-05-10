<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request){

        //Validar los datos enviados
        $credentials = $request->validate([
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string'],
        ]);

        //Verificamos que los datos recividos son validos

        if( ! Auth::attempt($credentials,$request->boolean('recuerdame'))){
            // los datos no son validos
            throw ValidationException::withMessages([
                'email'=> 'Correo no valido'
            ]);

        }
        // los datos  son validos
        $request->session()->regenerate();
        return redirect()->intended()->with('status','Bienvenido');
    }


    // metodo para cerrar sesión

    public function destroy( Request $request){

     Auth::guard('web')->logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();

     return to_route('login')->with('status','Sesión Cerrada con exito!!');
    }
}
