@extends('layouts.app')

@section('title','Editar Producto')
@section('meta-description', 'Hola Blog')

@section('content')

    <div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card card-success">
                <div class="card-header ">
                    <h3 class="card-title text-center">Editar Producto</h3>
                </div>
                <form action="{{route('product.update',$product)}}" method="POST">
                    @csrf @method('PATCH')
                    <div class="card-body">
                        @include('products.form-fields')
                        <br>
                        <select class="form-control form-control-lg" name="estado">
                            <?php
                                if($product['estado'] === "DISPONIBLE"){
                                    ?>
                                    <option value="DISPONIBLE" selected>DISPONIBLE</option>
                                    <option value="AGOTADO">AGOTADO</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="DISPONIBLE">DISPONIBLE</option>
                                    <option value="AGOTADO"selected>AGOTADO</option>
                                    <?php
                                }
                             ?>
                        </select>
                        <br>
                        <div class="mt-2 text-center">
                            <a href="{{route('product.index')}}"  class="btn btn-danger">Cancelar</a>
                            <button  type="submit" class="btn btn-success" >Editar</button>
                        </div>
                    </div>
                </form>
                 </div>
             </div>
         </div>
     </div>
@endsection
