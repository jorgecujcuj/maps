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
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i>
                                                @can('ver-usuario')
                                                <span>{{$cant_usuarios}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p></h4>
                                                @endcan
                                            </div>                                           
                                        </div>                           
                                    </div>  
                 
                        
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card blueUse order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>                                               
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i>
                                                @can('ver-rol')
                                                <span>{{$cant_roles}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p></h4>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                                                                         
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card greeUse order-card">
                                            <div class="card-block">
                                                <h5>Rutas</h5>                                               
                                                <h2 class="text-right"><i class="fa fa-route f-left"></i>
                                                @can('ver-ruta')
                                                <span>{{$cant_rutas}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/rutas" class="text-white">Ver más</a></p></h4>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card purUse order-card">
                                            <div class="card-block">
                                                <h5>Fincas</h5>                                               
                                                <h2 class="text-right"><i class="fa fa-map f-left"></i>
                                                @can('ver-finca')
                                                <span>{{$cant_fincas}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/fincas" class="text-white">Ver más</a></p></h4>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card purUse order-card">
                                            <div class="card-block">
                                                <h5>Unidades</h5>                                               
                                                <h2 class="text-right"><i class="fa fa-truck f-left"></i>
                                                @can('ver-unidad')
                                                <span>{{$cant_unidades}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/unidades" class="text-white">Ver más</a></p></h4>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card purUse order-card">
                                            <div class="card-block">
                                                <h5>Pilotos</h5>                                               
                                                <h2 class="text-right"><i class="fa fa-user-tie f-left"></i>
                                                @can('ver-piloto')
                                                <span>{{$cant_pilotos}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/pilotos" class="text-white">Ver más</a></p></h4>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card redUse order-card">
                                            <div class="card-block">
                                                <h5>Solicitudes</h5>                                               
                                                <h2 class="text-right"><i class="fa fa-file-signature f-left"></i>
                                                @can('ver-solicitud')
                                                <span>{{$cant_solicitude}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/solicitudes" class="text-white">Ver más</a></p></h4>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card purUse order-card">
                                            <div class="card-block">
                                                <h5>Solicitudes Programadas</h5>                                               
                                                <h2 class="text-right"><i class="fa fa-desktop f-left"></i>
                                                @can('ver-programados')
                                                <span>{{$cant_programado}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/programados" class="text-white">Ver más</a></p></h4>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card greeUse order-card">
                                            <div class="card-block">
                                                <h5>Confirmaciones</h5>                                               
                                                <h2 class="text-right"><i class="fa fa-check-circle f-left"></i>
                                                @can('ver-confirmacion')
                                                <span>{{$cant_confirmacion}}</span></h2>
                                                <h4><p class="m-b-0 text-right"><a href="/confirmaciones" class="text-white">Ver más</a></p></h4>
                                                @endcan
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

