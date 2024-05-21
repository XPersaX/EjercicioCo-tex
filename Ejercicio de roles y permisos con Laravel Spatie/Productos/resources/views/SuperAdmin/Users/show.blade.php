@extends('layouts.app')

@section('title','Ver Uusario')
@section('meta-description', 'Hola Blog')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card card-success">
                   <div class="card-header ">
                       <h3 class="card-title text-center">Datos del usuario</h3>
                   </div> 
                   <div class="card-body">
                       <label>Nombre Usuario</label>
                       <input class="form-control form-control-lg" type="text"  value="{{$user->name}}" disabled>
                       <br>
                       <label>Email Usuario</label>
                       <input class="form-control form-control-lg" type="text" min="1" value="{{$user->email}}" disabled>
                       <br>
                       <div class="mt-2 text-center">
                           <a href="{{route('superadmin.users.index')}}"  class="btn btn-danger">Atras</a>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
