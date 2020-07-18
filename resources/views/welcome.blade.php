<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ORDER-APP</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Kanit:600,600i,700,700i,800,800i,900,900i|Montserrat+Alternates:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    ORDER-APP
                </div>
                <hr>
                <div class="ba-background">
                    <div class="ba-banner">
                    <p>
                        Plataforma está diseñada para agregar personas, registrar sus datos personales y realizar consultas
                    </p>
                    </div>
                </div>
                <div class="ba-buttons">
                    <a href="{{ route('login') }}" class="btn btn-blue mr3">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-blue ml3">Registrate</a>
                </div>

            </div>
        </div>
    </body>
</html>
