@extends('layouts.app')

@section('title','Editar Permiso')
@section('meta-description', 'Editar Permisos')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
             <div class="col-md-6 mt-5">
                 <div class="card card-success">
                        <div class="card-header ">
                         <h3 class="card-title text-center">Editar Permisos</h3>
                        </div>
                        <form action="{{route('superadmin.permissions.update',$permission)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <label>Nobre del permiso</label>
                                <br>
                                <input class="form-control form-control-lg" min="4" type="text"  value="{{old('name',$permission->name)}}" name="name" placeholder="Ingrese el nombre del permiso" required>
                                @error('name')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <label>Descripción del permiso</label>
                                <br>
                                <textarea class="form-control form-control-lg"  name="description"  cols="2" rows="2" placeholder="Ingresela descripcion del permiso" required>{{old('description', $permission->description)}}</textarea>
                                @error('description')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                                <br>
                                <div class="mt-2 text-center">
                                    <a href="{{route('superadmin.permissions.index')}}"  class="btn btn-danger">Cancelar</a>
                                    <button  type="submit" class="btn btn-success" >Editar Permiso</button>
                                </div>
                            </div>
                        </form>
                 </div>
             </div>
         </div>
     </div>
@endsection
