@extends('layouts.app')

@section('title','Lista Roles')
@section('meta-description', 'Hola Roles')
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
                <div class="mb-1 ml-auto">
                    <a  type="button" class="btn btn-outline-primary" href="{{route('superadmin.roles.create')}}">
                        Registrar Role
                    </a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Role</th>
                            <th>Acciones</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($roles)) : ?>
                            <tr class="text-center">
                            <td colspan="5">No hay Roles.</td>
                            </tr>
                        <?php else : ?>
                            @foreach ($roles as $role)
                                <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                @auth
                                    <td>
                                        <div class="row">
                                            <div class="col-auto">
                                                <a href="{{route('superadmin.roles.show',$role)}}">
                                                    <i class="far fa-eye" style="color: #FFD43B;"></i>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{route('superadmin.roles.edit',$role)}}">
                                                    <i class="far fa-edit" style="color: #1851b4;"></i>
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" data-toggle="modal" data-target="#confirmDeleteRole">
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
    <div class="modal fade" id="confirmDeleteRole" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que quieres eliminar este Rol?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" action="{{ route('superadmin.roles.destroy', $role) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

