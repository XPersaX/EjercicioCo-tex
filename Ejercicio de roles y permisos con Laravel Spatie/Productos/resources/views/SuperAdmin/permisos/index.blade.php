@extends('layouts.app')

@section('title','Permisos')
@section('meta-description', 'Lista Permisos')
@section('content')
    <div class="content-wrapper">
        @if (session('status'))
            <div class="p-2 text-light bg-success" >
                <p class="h6">{{session('status')}}</p>
            </div>
        @endif 
        <div class="card">
            <br>
            <div class="card-body">
                <h1 class="m-0 text-center">Listado de permisos</h1>
                <div class="mb-1 ml-auto">
                    <a  type="button" class="btn btn-outline-primary" href="{{route('superadmin.permissions.create')}}">
                        Registrar Permiso
                    </a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del permiso</th>
                            <th>Descripción del permiso</th>  
                            <th>Fecha de registro</th>  
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($permissions)) : ?>
                            <tr class="text-center">
                            <td colspan="5">No hay permissions.</td>
                            </tr>
                        <?php else : ?>
                            @foreach ($permissions as $permission)
                                <tr>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->description}}</td>
                                <td>{{$permission->created_at}}</td>
                                @auth
                                    <td>
                                        <div class="row">
                                            <div class="col-auto">
                                                <a href="{{route('superadmin.permissions.edit',$permission)}}">
                                                    <i class="far fa-edit" style="color: #1851b4;"></i>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" data-toggle="modal" data-target="#confirmDeletePermission">
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
    <div class="modal fade" id="confirmDeletePermission" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que quieres eliminar este Permiso?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" action="{{ route('superadmin.permissions.destroy', $permission) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

