@extends('layouts.app')

@section('title','Registrar Usuario')
@section('meta-description', 'Hola Blog')

@section('content')

    <div class="content-wrapper">
        <div class="row justify-content-center">
             <div class="col-md-6 mt-5">
                 <div class="card card-success">
                     <div class="card-header ">
                         <h3 class="card-title text-center">Formulario De Registro</h3>
                     </div>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <label for="name">Nombre Usuario:</label>
                                <br>
                                <input class="form-control form-control-lg" type="text"  value="{{ old('name') }}" name="name" placeholder="Nombre Usuario" >
                                @error('name')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <label for="email">Email Usuario:</label>
                                <br>
                                <input class="form-control form-control-lg" type="email"  value="{{ old('email') }}" name="email" placeholder="Email Usuario" >
                                @error('email')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <label for="password">Contraseña</label>
                                <br>
                                <input class="form-control form-control-lg" type="password" name="password" placeholder="password Usuario" >
                                @error('password')
                                <br>
                                <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <label for="password">Confirmar Contraseña</label>
                                <br>
                                <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirmar Contraseña" >
                                @error('password_confirmation')
                                    <br>
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <div class="mt-2 text-center">
                                    <a href="{{route('product.index')}}"  class="btn btn-danger">Atras</a>
                                    <button  type="submit" class="btn btn-success" >Registrar</button>
                                </div>
                            </div>
                        </form>
                 </div>
             </div>
         </div>
    </div>

@endsection
