@extends('layouts.app')

@section('title','Roles')
@section('meta-description', 'Crear Role')
@section('content')

    <div class="content-wrapper">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">
                    <div class="card card-success">
                        <div class="card-header ">
                            <h3 class="card-title text-center">Formulario De Registro</h3>
                        </div>
                        <form action="{{route('superadmin.roles.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <label>Nombre Permiso</label>
                                <br>
                                <input class="form-control form-control-lg" type="text"  value="{{ old('name') }}" name="name" placeholder="Ingrese el nombre del rol" >
                                @error('name')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <span class="">
                                    Lista de permisos
                                </span>
                                @foreach ($permissions as $permission)
                                    <div>
                                        <label>
                                            <div class="">
                                                <input  type="checkbox" name="permissions[]" value="{{$permission->id}}" >
                                                {{$permission->description}}
                                            </div>
                                        </label>
                                    </div>
                                    
                                @endforeach
                                <div class="mt-2 text-center">
                                    <a href="{{route('superadmin.roles.index')}}"  class="btn btn-danger">Atras</a>
                                    <button  type="submit" class="btn btn-success" >Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection