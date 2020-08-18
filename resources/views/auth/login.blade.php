<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZARAZUA'S PHOTO</title>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ZARAZUA'S PHOTO</title>
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
</head>

<body>
    <div id="login" class="bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url('/images/background.jpg');">
        <div class="form-box">
            <h1 class="text-center text-uppercase title">zarazua's photo</h1>
            <form action="{{ url('/login') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="email" placeholder="Correo" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }} rounded-pill">
                    @error('email')
                    <small id="emailHelp" class="form-text invalid-feedback d-block text-white"> {{$message}} </small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Contraseña" class="form-control rounded-pill {{ $errors->has('password') ? 'is-invalid':'' }}">
                    @error('password')
                    <small id="emailHelp" class="form-text invalid-feedback d-block text-white"> {{$message}} </small>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block rounded-pill">Iniciar</button>
                </div>
            </form>
            <div class="form-group">
                <a href="{{ url('/') }}" class="btn btn-link btn-block text-white rounded-pill">Regresar</a>
            </div>
        </div>

    </div>
</body>

</html>