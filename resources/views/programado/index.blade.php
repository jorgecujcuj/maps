@extends('layouts.app')

@section('template_title')
    Programado
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Solicitudes Programadas</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-programados')
                                <a href="{{ route('programados.create') }}" class="btn btn-warning">
                                    {{ __('Crear') }}
                                </a>
                            @endcan
                        
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
                                        <th style="color:#fff;">Idsolicitud</th>
                                        <th style="color:#fff;">Operador</th>
                                        <th style="color:#fff;">Estado</th>
                                        <th style="color:#fff;">Idfinca</th>
                                        <th style="color:#fff;">Finca</th>
                                        <th style="color:#fff;">Idunidad</th>
                                        <th style="color:#fff;">Placa</th>
                                        <th style="color:#fff;">Salida</th>
                                        <th style="color:#fff;">FechaCreación</th>
                                        <th style="color:#fff;">Acciones</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($programados as $programado)
                                            <tr>
                                                <td>{{ $programado->id }}</td>
                                                <td>{{ $programado->idsolicitud }}</td>
                                                <td>{{ $programado->operador }}</td>
                                                <td>{{ $programado->estado }}</td>
                                                <td>{{ $programado->idfinca }}</td>
                                                <td>{{ $programado->finca->nombre }}</td>
                                                <td>{{ $programado->idunidad }}</td>
                                                <td>{{ $programado->unidade->placa }}</td>
                                                <td>{{ $programado->salida }}</td>
                                                <td>{{ $programado->created_at }}</td>
                                                <td>
                                                    <form action="{{ route('programados.destroy',$programado->id) }}" method="POST">
                                                        @can('ver-programados')
                                                        <a class="btn btn-sm btn-primary " href="{{ route('programados.show',$programado->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                        @endcan
                                                        @can('editar-programados')
                                                        <a class="btn btn-sm btn-success" href="{{ route('programados.edit',$programado->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-programados')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination justify-content-end">
                                {!! $programados->links() !!}
                            </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
