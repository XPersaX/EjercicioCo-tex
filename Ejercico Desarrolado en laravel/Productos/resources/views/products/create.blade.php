@extends('layouts.app')

@section('title','Crear Nuevo Producto')
@section('meta-description', 'Hola Crear Producto')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
             <div class="col-md-6 mt-5">
                 <div class="card card-success">
                        <div class="card-header ">
                         <h3 class="card-title text-center">Formulario Producto</h3>
                        </div>
                        <form action="{{route('product.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                @include('products.form-fields')
                                <br>
                                <div class="mt-2 text-center">
                                    <a href="{{route('product.index')}}"  class="btn btn-danger">Cancelar</a>
                                    <button  type="submit" class="btn btn-success" >Registrar</button>
                                </div>
                            </div>
                        </form>
                 </div>
             </div>
         </div>
     </div>
@endsection
