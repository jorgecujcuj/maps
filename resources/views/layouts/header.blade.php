<!--
<form class="form-inline mr-auto" action="#">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>-->
<ul class="navbar-nav navbar-right">

          
        <li class="nav-item dropdown active" style="background-color: #53AD4B">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img alt="image" src="{{ asset('img/menu.png') }}" width="85"
                     class=" mr-1 thumbnail-rounded user-thumbnail ">
            </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" style="font-weight: bold;" href="/home">{{ __('  Tablero') }}</a>
                        <a class="dropdown-item" style="font-weight: bold;" href="/usuarios">{{ __('  Usuario') }}</a>
                        <a class="dropdown-item" style="font-weight: bold;" href="/roles">{{ __('  Roles') }}</a>
                        <a class="dropdown-item" style="font-weight: bold;" href="/rutas">{{ __('  Rutas') }}</a>
                        <a class="dropdown-item" style="font-weight: bold;" href="/fincas">{{ __('  Fincas') }}</a>
                        <a class="dropdown-item" style="font-weight: bold;" href="/unidades">{{ __('  Unidades') }}</a>
                        <a class="dropdown-item" style="font-weight: bold;" href="/pilotos">{{ __('  Pilotos') }}</a>
                        <a class="dropdown-item" style="font-weight: bold;" href="/solicitudes">{{ __('  Solicitud') }}</a>
                </div>
        </li>
        
                    
    @if(\Illuminate\Support\Facades\Auth::user())

        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/logo2.png') }}" width="75"
                     class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                <div class="d-sm-none d-lg-inline-block">
                <h5>Hola</h5> {{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                Bienvenido: {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                    <i class="fa fa-user"></i>Editar Perfil</a>
                <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i
                            class="fa fa-lock"> </i>Cambiar la Contraseña</a>
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    @else
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
                <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('messages.common.login') }}
                    / {{ __('messages.common.register') }}</div>
                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
                </a>
            </div>
        </li>
    @endif
</ul>

@section('css')

@endsection

@section('js')

@endsection