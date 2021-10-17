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
                                    
                                    <div class="card bg-c-blue order-card">
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
                                        <div class="card bg-c-green order-card">
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
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Rutas</h5>                                               
                                                @php
                                                 use App\Models\Ruta;
                                                $cant_rutas = Ruta::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-tractor f-left"></i><span>{{$cant_rutas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/rutas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Fincas</h5>                                               
                                                @php
                                                 use App\Models\Finca;
                                                $cant_fincas = Finca::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-tractor f-left"></i><span>{{$cant_fincas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/fincas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Unidades</h5>                                               
                                                @php
                                                 use App\Models\Unidade;
                                                $cant_unidades = Unidade::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-tractor f-left"></i><span>{{$cant_unidades}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/unidades" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Pilotos</h5>                                               
                                                @php
                                                 use App\Models\Piloto;
                                                $cant_pilotos = Piloto::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-tractor f-left"></i><span>{{$cant_pilotos}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/pilotos" class="text-white">Ver más</a></p>
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

