<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePermissionsRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    public function __construct()
    {
        //Proteger rutas segun los permisos
        $this->middleware('can:superadmin.permisos.index')->only('index');
        $this->middleware('can:superadmin.permisos.edit')->only('edit','update');
        $this->middleware('can:superadmin.permisos.show')->only('show');
        $this->middleware('can:superadmin.permisos.create')->only('create','store');
        $this->middleware('can:superadmin.permisos.destroy')->only('destroy');
    }

    //Metodo para  mostrar la lista de permisos
    public function index()
    {
        $permissions = Permission::all();
        return view('SuperAdmin.permisos.index',compact('permissions'));
    }

    //Metodo para  mostrar la vista para registrar un permiso
    public function create()
    {
        return view('SuperAdmin.permisos.create');
    }

    //Metodo para registrar el permiso
    public function store(SavePermissionsRequest $request)
    {
       Permission::create($request->validated());
       return to_route('superadmin.permissions.index')->with('status','Permiso Creado con exito');
    }
    
    //Metodo para  mostrar vista para editar los datos del permiso
    public function edit(Permission $permission)
    {
        return view('SuperAdmin.permisos.edit',compact('permission'));
    }

    //Metodo para  editar un permiso
    public function update(SavePermissionsRequest $request, Permission $permission)
    {

        $permission->update($request->validated());
        return to_route('superadmin.permissions.index')->with('status','Permiso Editado con exito');

    }

    //Metodo para  eliminar un permiso
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return to_route('superadmin.permissions.index')->with('status','Permiso Eliminado con exito');
    }
}
