@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-10">
        <h1 class="h3 mb-4 text-gray-800">Usuarios</h1>
    </div>
    <div class="col-sm-2">
        <a href="{{url('admin/usuarios/create')}}" class="btn btn-primary btn-block">Nuevo Usuario</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ url('admin/usuarios/'.$user->id.'/edit') }}" class="btn btn-warning btn-icon-split float-left mx-2">
                                    <span class="icon text-white-50">
                                                <i class="fas fa-pencil"></i>
                                            </span>
                                            <span class="text">Modificar</span>
                                        </a>
                                    <form method="post" class="delete" action="{{ route('admin.usuarios.destroy', $user->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Eliminar</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
   
</script>
@endsection