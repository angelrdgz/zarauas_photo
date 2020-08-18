<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZARAZUA'S PHOTO</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
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
    <div id="gallery" class="bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url('/images/background.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 d-flex align-items-center">
                    <a href="{{ url('/') }}" class="btn btn-link text-white">
                        <i class="fal fa-arrow-circle-left fa-lg mr-2"></i>
                        <span class="float-right d-none d-sm-block">Regresar</span>
                    </a>
                </div>
                <div class="col-xs-8 col-sm-4 col-md-4 my-4">
                    <h1 class="title text-center">{{ $album->name }}</h1>
                </div>
                <div class="col-sm-12 gridBox">
                    @foreach($album->photos as $photo)
                    <a href="{{ asset('images/albums/'.$album->id.'/photos/'.$photo->filename) }}" data-lightbox="gallery"><img src="{{ asset('images/albums/'.$album->id.'/photos/'.$photo->filename) }}" alt=""></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {

            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true
            })
        });
    </script>
</body>

</html>