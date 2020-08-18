@extends("layouts.admin")

@section("content")
<div class="row">
    <div class="col-sm-12">
        <h1 class="h3 mb-4 text-gray-800">Nuevo Usuario</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post" id="questionForm" action="{{ url('admin/usuarios') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" name="name" class="form-control">
                                        @error('name')
                                        <small id="emailHelp" class="form-text invalid-feedback d-block text-danger"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control">
                                        @error('email')
                                        <small id="emailHelp" class="form-text invalid-feedback d-block text-danger"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    @error('password')
                                    <small id="emailHelp" class="form-text invalid-feedback d-block text-danger"> {{$message}} </small>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Confirmar Contraseña</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    @error('password')
                                    <small id="emailHelp" class="form-text invalid-feedback d-block text-danger"> {{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 offset-sm-4">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ url('admin/propiedades') }}" class="btn btn-secondary btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")

<script>
    var $uploadCrop;
    var opts = {
        url: '{{ asset("images/default_image.png")}}',
        viewport: {
            width: 200,
            height: 200,
            type: 'squart'
        },
        boundary: {
            width: 300,
            height: 300
        }
    };

    clearImage = (ctrl) => {
        if ($(ctrl).val() == "") {
            $('#upload-demo').croppie('destroy');
            $uploadCrop = $('#upload-demo').croppie(opts);
        }
    }

    readFile = (input) => {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                });
                $('.upload-demo').addClass('ready');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $uploadCrop = $('#upload-demo').croppie(opts);

    $(document).on('change', 'select[name="role_id"]', function() {
        if ($(this).val() == 2) {
            $('.realEstate').removeClass('d-none');
        } else {
            $('.realEstate').addClass('d-none');
        }
    })

    $(document).on('change', 'input[type="file"]', function() {
        readFile(this)
    })

    $('#upload-demo').on('update.croppie', function(ev, cropData) {

        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'original'
        }).then(function(resp) {
            $('#imagebase64').val(resp);
            $('#form').submit();
        });
        console.log(cropData)
    });
</script>

@endsection