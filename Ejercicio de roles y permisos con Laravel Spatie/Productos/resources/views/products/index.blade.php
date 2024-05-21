@extends('layouts.app')

@section('title','Lista Productos')
@section('meta-description', 'Hola Productos')
@section('content')

<div class="content-wrapper">
  @if (session('status'))
    <div class="p-2 text-light bg-success" >
      <p class="h6">{{session('status')}}</p>
    </div>
  @endif
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mis Productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <!-- <li class="breadcrumb-item active">Starter Page</li> -->
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <div class="mb-1 ml-auto">
        <a  type="button" class="btn btn-outline-primary" href="{{route('product.create')}}">
          Registrar Producto
        </a>
      </div>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Fecha Registro</th>
          <th>Estado</th>
          @auth
            <th>Acciones</th>  
          @endauth
        </tr>
        </thead>
        <tbody>
          <?php if (empty($product)) : ?>
            <tr class="text-center">
              <td colspan="5">No hay productos disponibles.</td>
            </tr>
          <?php else : ?>
            @foreach ($product as $product)
                <tr>
                  <td><?php echo $product['nombre']; ?></td>
                  <td><?php echo $product['cantidad']; ?></td>
                  <td><?php echo $product['created_at']; ?></td>
                  <?php if ($product['estado'] === "DISPONIBLE") : ?>
                  <td class="bg-success"><?php echo $product['estado']; ?></td>
                  <?php else : ?>
                  <td class="bg-danger"><?php echo $product['estado']; ?></td>
                  <?php endif; ?>
                  @auth
                    <td>
                      <div class="row">
                        <div class="col-auto">
                          <a href="{{route('product.show',$product->id)}}">
                            <i class="far fa-eye" style="color: #FFD43B;"></i>
                          </a>
                        </div>
                        <div class="col-auto">
                          <a href="{{route('product.edit',$product->id)}}">
                            <i class="far fa-edit" style="color: #1851b4;"></i>
                          </a>
                        </div>
                        <div class="col-auto">
                          <a href="#" data-toggle="modal" data-target="#confirmDeleteModal">
                            <i class="fas fa-trash-alt" style="color: #b90e0e;"></i>
                        </a>
                        </div>
                      </div>
                    </td>
                  @endauth
                </tr>
            @endforeach
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              ¿Estás seguro de que quieres eliminar este producto?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <form id="deleteForm" action="{{ route('product.destroy', $product) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection

