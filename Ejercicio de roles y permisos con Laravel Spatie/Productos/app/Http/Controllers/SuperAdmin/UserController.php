<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function __construct()
    {
        //Proteger rutas segun los permisos
        $this->middleware('can:superadmin.users.index')->only('index');
        $this->middleware('can:superadmin.users.edit')->only('edit','update');
        $this->middleware('can:superadmin.users.show')->only('show');
        $this->middleware('can:superadmin.users.create')->only('create','store');
        $this->middleware('can:superadmin.users.destroy')->only('destroy');
    }

    //Metodo para  mostrar la lista de usuarios
    public function index()
    {
        $user = User::get();
        return view('SuperAdmin.Users.index',['user' => $user]);
    }

    
    //Metodo para  mostrar vista para ver  los datos del usuario
    public function show(User $user)
    {
        return view('SuperAdmin.users.show',compact('user'));
    }

    //Metodo para  mostrar vista para editar los datos del usuario
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('SuperAdmin.Users.edit',compact('user','roles'));
    }

    //Metodo para  editar un usuario
    public function update(Request $request, User $user)
    {
        //Validar los datos enviados
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)]
        ]);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        $user->roles()->sync($request->roles);
        return to_route('superadmin.users.index',$user)->with('status','Usuario Editado con exito');

    }

    //Metodo para  eliminar un usuario
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('superadmin.users.index')->with('status','Usuario Eliminado con exito');
    }
}
