@extends('layouts.app')

@section('title','Editar Usuario')
@section('meta-description', 'Hola Blog')

@section('content')

    <div class="content-wrapper">
        <div class="row justify-content-center">
             <div class="col-md-6 mt-5">
                 <div class="card card-success">
                     <div class="card-header ">
                         <h3 class="card-title text-center">Editar Uusario</h3>
                     </div>
                        <form action="{{route('superadmin.users.update',$user)}}" method="POST">
                            @csrf  @csrf @method('PATCH')
                            <div class="card-body">
                                <label for="name">Nombre Usuario:</label>
                                <br>
                                <input class="form-control form-control-lg" type="text"  value="{{ old('nombre', $user->name)}}" name="name" placeholder="Nombre Usuario" required >
                                @error('name')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <input class="form-control form-control-lg" type="text"  value="{{ old('email', $user->email)}}" name="email" placeholder="Email Usuario" required >
                                @error('email')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <label for="name">Listado de roles:</label>
                                @foreach ($roles as $role)
                                    <div>
                                        <label>
                                            <input class="ml-2" type="checkbox" name="roles[]" value="{{ old('roles', $role->id)}}" {{ $user->roles->contains($role->id) ? 'checked' : '' }} >
                                            {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
                                <br>
                                <div class="mt-2 text-center">
                                    <a href="{{route('superadmin.users.index')}}"  class="btn btn-danger">Atras</a>
                                    <button  type="submit" class="btn btn-success" >Editar</button>
                                </div>
                            </div>
                        </form>
                 </div>
             </div>
         </div>
    </div>

@endsection
