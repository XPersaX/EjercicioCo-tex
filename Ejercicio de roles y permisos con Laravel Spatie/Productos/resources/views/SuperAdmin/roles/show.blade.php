
@extends('layouts.app')

@section('title','Ver Rol')
@section('meta-description', 'Hola Productos')
@section('content')

<div class="content-wrapper">

    <div class="card-body"> 
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card card-success">
                    <div class="card-header ">
                        <h3 class="card-title text-center">Información del rol</h3>
                    </div>
                        <div class="card-body">
                            <label>Rol</label>
                            <br>
                            <input class="form-control form-control-lg" type="text"  value="{{$role->name}}" disabled>
                            @error('name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <label class="mt-2">
                                Lista de permisos para el rol {{$role->name}}
                            </label>
                            @foreach ($permissions as $permission)
                                <div class="">
                                    <label>
                                        <div class="">
                                            <input type="checkbox" value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }} @disabled(true)>
                                            {{ $permission->description }}
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                            <div class="mt-2 text-center">
                                <a href="{{ route('superadmin.roles.index') }}" class="btn btn-danger">Atras</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection