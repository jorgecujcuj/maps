@extends('layouts.app')

@section('template_title')
    Solicitudes
@endsection

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Solicitudes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-solicitud')
                            <a href="{{ route('solicitudes.create') }}" class="btn btn-warning">
                                {{ __('Nuevo') }}
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
                                            <th style="color:#fff;">Idfinca</th>
                                            <th style="color:#fff;">Idpiloto</th>
                                            <th style="color:#fff;">Fecha solicitada</th>
                                            <th style="color:#fff;">Telefono</th>
                                            <th style="color:#fff;">Observacion</th>
                                            <th style="color:#fff;">RegistroCreadpo</th>
                                            <th style="color:#fff;">Acciones</th>   
                                            </tr>
                                        </thead>
                                            <tbody>
                                            @foreach ($solicitudes as $solicitude)
                                                <tr>
                                                    <td>{{ $solicitude->id }}</td>
                                                    <td>{{ $solicitude->idfinca }}</td>
                                                    <td>{{ $solicitude->idpiloto }}</td>
                                                    <td>{{ $solicitude->fechasolicitada }}</td>
                                                    <td>{{ $solicitude->telefono }}</td>
                                                    <td>{{ $solicitude->observacion }}</td>
                                                    <td>{{ $solicitude->created_at }}</td>

                                                    <td>
                                                        <form action="{{ route('solicitudes.destroy',$solicitude->id) }}" method="POST">
                                                            @can('ver-solicitud')
                                                            <a class="btn btn-sm btn-primary " href="{{ route('solicitudes.show',$solicitude->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                            @endcan
                                                            @can('editar-solicitud')
                                                            <a class="btn btn-sm btn-success" href="{{ route('solicitudes.edit',$solicitude->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                            @endcan
                                                            @csrf
                                                            @method('DELETE')
                                                            @can('borrar-solicitud')
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
                                {!! $solicitudes->links() !!}
                                </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
