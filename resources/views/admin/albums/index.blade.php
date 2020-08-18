@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-10">
        <h1 class="h3 mb-4 text-gray-800">Álbumes</h1>
    </div>
    <div class="col-sm-2">
        <a href="{{url('admin/albumes/create')}}" class="btn btn-primary btn-block">Nuevo Album</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    @foreach($albums as $album)
                    <div class="col-sm-3 mb-3">
                        <div class="card card-album" style="w-100">

                            <div class="card-header p-0">
                                @if($album->cover != NULL)
                                <img class="mw-100 mh-100" src="{{ asset('images/albums/'.$album->id.'/'.$album->cover) }}" />
                                @else
                                <img class="mw-100 mh-100" src="https://via.placeholder.com/728x500.png?text=No+Image" />
                                @endif
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-wrap text-center">{{ $album->name }}</h5>
                                <ul class="w-100 p-0 d-flex justify-content-around" style="list-style: none;">
                                    <li>
                                        <a href="{{ url('admin/albumes/'.$album->id.'/edit') }}">
                                            <i class="fas fa-pencil-alt text-warning"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/galerias/'.$album->id.'/fotos') }}">
                                            <i class="fas fa-camera-retro"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="post" class="delete d-flex justify-content-center align-items-center" action="{{ url('admin/albumes/'.$album->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="delete-icon bg-transparent border-0" type="submit">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection