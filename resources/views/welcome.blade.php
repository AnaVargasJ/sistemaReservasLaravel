
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Sistema de Reservas</title>
</head>

<body class ="bare" >

    <header class="check" id="check">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="cosh">
            <div class="container">
                <a class="navbar-brand" href="{{ route('inicio') }}">
                    <img src="{{ asset('img/moon.png') }}" alt="Logo" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">



                            </ul>
                            <div class="nav__close" id="nav-close">
                                <i class='bx bx-x'></i>
                            </div>
                            <img src="./images/nav-light.png" alt="" class="nav__img">
                        </div>

                        <ul class="navbar-nav ms-auto" >
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" id="chorro" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" id="chorro" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown" >
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>

    </header>
    background: linear-gradient(90deg, rgba(37,30,139,1) 0%, rgba(67,57,167,0.7230392156862745) 52%, rgba(28,148,172,1) 99%);

     {{-- <img src="{{ asset('img/ana1.png') }}" class="mora" > --}}

     {{-- <img src="{{ asset('img/ver1.png') }}" class="mora" > --}}
     {{-- <img src="{{ asset('img/chu.jpg') }}" class="mora" > --}}


    <div class="position-absolute top-50 start-50 translate-middle ">

         <div class="titulo-principal"  style="text-align: left">Bienvenido</div>
        <br><br>
        <div class="d-grid gap-2 d-md-block ">

                <div class="d-grid gap-2 col-6 mx-auto"><a href="{{ route('salas.index') }}" class="super">Empezar</a>

        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

