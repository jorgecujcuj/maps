<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Geolocalizacion</title>
        <link rel="stylesheet" href="{{ asset('web/css/style2.css') }}">
        <link rel="icon" type="image/png" href="img/g8.png">
    </head>
    
    <body>
        <div class="container">
            <div class="navbar">
                <img src="img/logo5.png" class="logo">
                <nav>
                    <img src="img/g9.png" class="logo2">
                    
                </nav>
                <a href="{{ route('register') }}" class="rg">Registrar</a>
            </div>
            <div class="row">
                <div class="col-1">
                    <h2>Geolocalizacion</h2>
                    <h3>¡Bienvenidos!</h3>
                    
                    <a href="{{ route('login') }}">
                        <button type="button">Iniciar Sesión<img src="img/ini10.png"> </button>
                    </a>
                   
                </div>
                <div class="col-2">
                    <img src="img/m7.jpg" class="paisaje">
                    <div class="color-box"></div>
                </div>
            </div>
            <div class="frase">
                <h4>- Altamente productivos profundamente humanos -</h3>
            </div>
        </div>
    </body>
</html>