@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="h3 mb-4 text-gray-800">Configuración</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#menu1">Redes Sociales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home">Covers</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <form action="{{ route('admin.configuracion.update',1) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="tab-content">
                                <div id="menu1" class="container tab-pane active"><br>
                                    <h3>Redes Sociales</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Facebook</label>
                                            <input type="text" name="facebook" value="{{ $configuration->facebook }}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Instagram</label>
                                            <input type="text" name="instagram" value="{{ $configuration->instagram }}" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Whatsapp</label>
                                            <input type="text" name="whatsapp" value="{{ $configuration->whatsapp }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div id="home" class="container tab-pane"><br>
                                    <h3>Covers</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            @foreach($configuration->photos as $photo)
                                            <div class="previewBox">
                                                <a class="deleteConfigPhoto delete-icon border-0 d-flex justify-content-center align-items-center" data-url="{{ url('admin/configuracion/'.$configuration->id.'/fotos/'.$photo->id) }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                <div class="previewImage">
                                                    <img src="{{ asset('images/configuration/covers/1/'.$photo->filename) }}" alt="">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-12 dropzoneBox mt-3">
                                            <div id="dropzone" class="w-100 d-flex justify-content-center align-items-center" style="min-height: 200px; border: 2px dashed #999;">
                                                <div class="dz-message" data-dz-message><span>Selecciona o arrastra tus imagenes aquí</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-2 offset-sm-5">
                                        <button class="btn btn-primary btn-block">Guardar</button>
                                    </div>
                                </div>
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
    let auxZone = false;

    $(document).on('click', '.deleteConfigPhoto', function() {
        let box = $(this).closest('.previewBox')
        let question = confirm("¿Estas seguro de eliminar?");
        if (question) {
            $.ajax({
                url: $(this).data('url'),
                method: "POST",
                async: true,
                data: {
                    _method: "DELETE",
                    _token: "{{csrf_token()}}",
                },
                success: function(data) {
                    console.log(data);
                    box.fadeOut('slow');
                },
                error: function(msg) {
                    console.error(msg);
                }
            })
        }
    })

    $(document).on('click', '.nav-tabs .nav-item', function() {
        if ($(this).index() == 1 && auxZone == false) {
            new Dropzone("#dropzone", {
                maxFilesize: 12,
                method: "post",
                url: '{{ url("admin/configuracion/1/fotos") }}',
                dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
                dictResponseError: 'Error uploading file!',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: false,
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
            });

            auxZone = true;

        }
    })
</script>
@endsection