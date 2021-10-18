@extends('layouts.app')

@section('template_title')
    Ruta
@endsection

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Rutas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        @can('crear-ruta')
                                        <a href="{{ route('rutas.create') }}" class="btn btn-warning">
                                        {{ __('Nuevo') }}
                                        </a>
                                        @endcan
                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                            <form action="{{ route('rutas.index') }}" method="get">
                                                <div class="form-row">
                                                    <div class="col-sm">
                                                        <input type="text" class="form-control" placeholder="" name="texto" value="{{ $texto }}">
                                                    </div>

                                                        <input type="submit" class="btn btn-primary" Value="Buscar">
                    
                                                </div>
                                            </form>
                                    </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" style="color: black; background-color:#E9F7EF;">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                                <div class="table-responsive">
                                    <table class="table table-striped mt-2">
                                        <thead style="background-color:#515151">
                                            <tr>
                                            <th style="color:#fff;">Id</th>
                                            <th style="color:#fff;">Codigo</th>
                                            <th style="color:#fff;">Nombre</th>
                                            <th style="color:#fff;">Latitud</th>
                                            <th style="color:#fff;">Longitud</th>
                                            <th style="color:#fff;">Acciones</th> 
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rutas as $ruta)
                                                <tr>
                                                    <td>{{ $ruta->id }}</td>
                                                    <td>{{ $ruta->codigo }}</td>
                                                    <td>{{ $ruta->nombre }}</td>
                                                    <td>{{ $ruta->latitud }}</td>
                                                    <td>{{ $ruta->longitud }}</td>

                                                    <td>
                                                        <form action="{{ route('rutas.destroy',$ruta->id) }}" method="POST">
                                                            @can('ver-ruta')
                                                            <a class="btn btn-sm btn-primary " href="{{ route('rutas.show',$ruta->id) }}"><i class="fa fa-fw fa-eye"></i> Trazar Ruta</a>
                                                            @endcan
                                                            @can('editar-ruta')
                                                            <a class="btn btn-sm btn-success" href="{{ route('rutas.edit',$ruta->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @csrf
                                                            @method('DELETE')
                                                            @can('borrar-ruta')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                            @endcan
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
           

                            <div class="pagination justify-content-end">
                                {!! $rutas->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
