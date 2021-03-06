@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-10">
        <h1 class="h3 mb-4 text-gray-800">Nuevo Album</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-body">
            <form method="post" id="questionForm" enctype="multipart/form-data" action="{{ url('admin/albumes') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="name" value="" class="form-control">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Imagen</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="cover" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Buscar</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img src="https://via.placeholder.com/400x200" class="d-block m-auto" alt="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-2 offset-sm-4">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ url('admin/albumes') }}" class="btn btn-secondary btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection