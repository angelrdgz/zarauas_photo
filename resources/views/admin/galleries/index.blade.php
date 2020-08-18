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
                    <div class="col-sm-12">
                        @foreach($album->photos as $photo)
                        <div class="previewBox">
                            <form method="post" class="delete d-flex justify-content-center align-items-center" action="{{ url('admin/galerias/'.$album->id.'/fotos/'.$photo->id) }}">
                                @method('DELETE')
                                @csrf
                                <button class="delete-icon border-0" type="submit">
                                    <i class="far fa-trash-alt"></i>
                                </button>

                            </form>
                            <div class="previewImage">
                                <img src="{{ asset('images/albums/'.$album->id.'/photos/'.$photo->filename) }}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-sm-12">
                    <form method="post" action="{{ url('admin/galerias/'.$album->id.'/fotos') }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="dz-message" data-dz-message><span>Selecciona o arrastra tus imagenes aquí</span></div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    /*new Dropzone("#dropzone", {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ url("delete") }}',
                    data: {
                        filename: name
                    },
                    success: function(data) {
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

            success: function(file, response) {
                console.log(response);
            },
            error: function(file, response) {
                return false;
            }
        });*/
</script>
@endsection