@extends('layouts.app')

@section('title','Lista de usuarios')
@section('meta-description', 'Users')
@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
             <h1 class="m-0">Usuarios</h1>
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
        @if (session('status'))
            <div class="p-2 text-light bg-success" >
                <p class="h6">{{session('status')}}</p>
            </div>
        @endif 
        <div class="card-body">
            @can('superadmin.users.create')
                <div class="mb-1 ml-auto">
                    <a  type="button" class="btn btn-outline-primary" href="{{route('register')}}">
                    Registrar Usuario
                    </a>
                </div>
            @endcan
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha Registro</th>
                @can('superadmin.users.acciones')
                    <th>Acciones</th>    
                @endcan
                    
                </tr>
                </thead>
                <tbody>
                <?php if (empty($user)) : ?>
                    <tr class="text-center">
                        <td colspan="5">No hay usuarios disponibles.</td>
                    </tr>
                <?php else : ?>
                    @foreach ($user as $user)
                        <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                            @can('superadmin.users.acciones')
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                                <a href="{{route('superadmin.users.show',$user->id)}}">
                                                    <i class="far fa-eye" style="color: #FFD43B;"></i>
                                                </a>
                                        </div>
                                        <div class="col-auto">
                                            @can('superadmin.users.edit')
                                                <a href="{{route('superadmin.users.edit',$user->id)}}">
                                                    <i class="far fa-edit" style="color: #1851b4;"></i>
                                                </a>
                                            @endcan
                                        </div>
                                        <div class="col-auto">
                                            @can('superadmin.users.destroy')
                                                <a href="#" data-toggle="modal" data-target="#confirmDeleteUser">
                                                    <i class="fas fa-trash-alt" style="color: #b90e0e;"></i>
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                                
                            @endcan
                        </tr>
                    @endforeach
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
    </div>

    <div class="modal fade" id="confirmDeleteUser" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que quieres eliminar este Usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" action="{{route('superadmin.users.destroy',$user)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

