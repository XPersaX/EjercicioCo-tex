
@extends('layouts.app')

@section('title','Editar Roles')
@section('meta-description', 'Hola Productos')
@section('content')

<div class="content-wrapper">
    <div class="card-body"> 
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card card-success">
                    <div class="card-header ">
                        <h3 class="card-title text-center">Editar Role</h3>
                    </div>
                    <form action="{{ route('superadmin.roles.update',$role) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <label>Rol</label>
                            <br>
                            <input class="form-control form-control-lg" type="text"  value="{{ old('name',$role->name) }}" name="name" placeholder="Ingrese el nombre del rol" >
                            @error('name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <label>
                                Lista de permisos
                            </label>
                            @foreach ($permissions as $permission)
                                <div class="">
                                    <label>
                                        <div class="">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                            {{ $permission->description }}
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                            <div class="mt-2 text-center">
                                <a href="{{ route('superadmin.roles.index') }}" class="btn btn-danger">Atras</a>
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection