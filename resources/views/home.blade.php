@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tablero</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                        <div class="row">
                                <div class="col-md-4 col-xl-4">
                                
                                    
                                    <div class="card blueUse order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>                    
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                            </div>                                           
                                        </div>                                
                                    </div>  
                                    
                        
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card blueUse order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>                                               
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                                                                         
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card greeUse order-card">
                                            <div class="card-block">
                                                <h5>Rutas</h5>                                               
                                                @php
                                                 use App\Models\Ruta;
                                                $cant_rutas = Ruta::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-route f-left"></i><span>{{$cant_rutas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/rutas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card purUse order-card">
                                            <div class="card-block">
                                                <h5>Fincas</h5>                                               
                                                @php
                                                 use App\Models\Finca;
                                                $cant_fincas = Finca::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-map f-left"></i><span>{{$cant_fincas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/fincas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card purUse order-card">
                                            <div class="card-block">
                                                <h5>Unidades</h5>                                               
                                                @php
                                                 use App\Models\Unidade;
                                                $cant_unidades = Unidade::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-truck f-left"></i><span>{{$cant_unidades}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/unidades" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card purUse order-card">
                                            <div class="card-block">
                                                <h5>Pilotos</h5>                                               
                                                @php
                                                 use App\Models\Piloto;
                                                $cant_pilotos = Piloto::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-user-tie f-left"></i><span>{{$cant_pilotos}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/pilotos" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card redUse order-card">
                                            <div class="card-block">
                                                <h5>Solicitudes</h5>                                               
                                                @php
                                                 use App\Models\Solicitude;
                                                $cant_solicitude = Solicitude::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-file-signature f-left"></i><span>{{$cant_solicitude}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/solicitudes" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card purUse order-card">
                                            <div class="card-block">
                                                <h5>Solicitudes Programadas</h5>                                               
                                                @php
                                                 use App\Models\Programado;
                                                $cant_programado = Programado::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-desktop f-left"></i><span>{{$cant_programado}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/programados" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card greeUse order-card">
                                            <div class="card-block">
                                                <h5>Confirmaciones</h5>                                               
                                                @php
                                                 use App\Models\Confirmacione;
                                                $cant_confirmacion = Confirmacione::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-check-circle f-left"></i><span>{{$cant_confirmacion}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/confirmaciones" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>  
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

