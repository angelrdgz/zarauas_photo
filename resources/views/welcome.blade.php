<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZARAZUA'S PHOTO</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!--<div id="main" class="bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url('/images/background.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                    <ul class="social d-flex flex-column justify-content-around">
                        <li>
                            <a href="">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-10 d-flex justify-content-center align-items-center">
                    <h1 class="text-center text-uppercase title">zarazua's photo</h1>
                </div>
                <div class="col-sm-1">
                    <ul class="social d-flex flex-column justify-content-around">
                        <li>
                            <a href="">
                                Opción 1
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Opción 2
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Opción 3
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>-->
    <div id="main" class="bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url('/images/configuration/covers/1/{{$photo[0]->filename}}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="social d-flex flex-row justify-content-around">
                        <li>
                            <a href="{{ $configuration->facebook }}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $configuration->instagram }}" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $configuration->whatsapp }}" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 my-4 d-flex justify-content-center align-items-center">
                    <h1 class="text-center text-uppercase title">zarazúa's photo</h1>
                </div>
                <div class="col-sm-12">
                    <ul class="social d-flex flex-row justify-content-around">
                        @foreach($albums as $album)
                        <li>
                            <a href="{{ url('galeria/'.$album->id) }}">
                                {{ $album->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>