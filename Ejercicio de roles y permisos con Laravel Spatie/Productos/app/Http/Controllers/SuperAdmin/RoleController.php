<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\SaveRoleRequest;

class RoleController extends Controller
{

    public function __construct()
    {
        //Proteger rutas segun los permisos
        $this->middleware('can:superadmin.roles.index')->only('index');
        $this->middleware('can:superadmin.roles.create')->only('create','store');
        $this->middleware('can:superadmin.roles.edit')->only('edit','update');
        $this->middleware('can:superadmin.roles.show')->only('show');
        $this->middleware('can:superadmin.roles.destroy')->only('destroy');
    }

    //Metodo para  mostrar la lista de roles
    public function index()
    {
        $roles = Role::get();
        return view('SuperAdmin.roles.index',compact('roles'));
    }

    //Metodo para  mostrar la vista para registrar un role
    public function create()
    {
        $permissions = Permission::all();
        return view('SuperAdmin.roles.create',compact('permissions'));
    }

    //Metodo para registrar el role
    public function store(SaveRoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->sync($request->permissions);
        return to_route('superadmin.roles.index')->with('status','Rol Creado con exito');
    }

    //Metodo para  mostrar vista para ver  los datos del role
    public function show(Role $role)
    {
        $permissions = $role->permissions;
        return view('SuperAdmin.roles.show',compact('role','permissions'));
    }

    //Metodo para  mostrar vista para editar los datos del role
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('SuperAdmin.roles.edit',compact('role','permissions'));
    }
    
    
    //Metodo para  editar un rol
    public function update(SaveRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        $role->permissions()->sync($request->permissions);
        return to_route('superadmin.roles.index')->with('status','Rol Editado con exito');
        
    }

    //Metodo para  eliminar un rol
    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('superadmin.roles.index')->with('status','Rol Eliminado con exito');
    }
}
