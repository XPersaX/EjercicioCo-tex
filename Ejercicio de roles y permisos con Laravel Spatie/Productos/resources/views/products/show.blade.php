@extends('layouts.app')

@section('title','Detalles Producto')
@section('meta-description', 'Hola Blog')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card card-success">
                   <div class="card-header ">
                       <h3 class="card-title text-center">Deatalle Producto</h3>
                   </div> 
                   <div class="card-body">
                       <input class="form-control form-control-lg" type="text"  value="{{$product->nombre}}" disabled>
                       <br>
                       <input class="form-control form-control-lg" type="number" min="1" value="{{$product->cantidad}}" disabled>
                       <br>
                       <input class="form-control form-control-lg" type="text" value="{{$product->estado}}" disabled>
                       <br>
                       <div class="mt-2 text-center">
                           <a href="{{route('product.index')}}"  class="btn btn-danger">Atras</a>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
