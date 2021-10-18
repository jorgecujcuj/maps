@extends('layouts.app')

@section('template_title')
    Confirmacione
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Tabla de Confirmaciones</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-confirmacion')
                                <a href="{{ route('confirmaciones.create') }}" class="btn btn-warning">
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
                                        <th style="color:#fff;">Idprogramado</th>
                                        <th style="color:#fff;">Latitud</th>
                                        <th style="color:#fff;">Longitud</th>
                                        <th style="color:#fff;">Abastecida</th>
                                        <th style="color:#fff;">Descripcion</th>
                                        <th style="color:#fff;">FechaCreación</th>
                                        <th style="color:#fff;">Acciones</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confirmaciones as $confirmacione)
                                            <tr>
                                                <td>{{ $confirmacione->id }}</td>
                                                <td>{{ $confirmacione->idprogramado }}</td>
                                                <td>{{ $confirmacione->latitud }}</td>
                                                <td>{{ $confirmacione->longitud }}</td>
                                                <td>{{ $confirmacione->abastecida }}</td>
                                                <td>{{ $confirmacione->descripcion }}</td>
                                                <td>{{ $confirmacione->created_at }}</td>

                                                <td>
                                                    <form action="{{ route('confirmaciones.destroy',$confirmacione->id) }}" method="POST">
                                                        @can('ver-confirmacion')
                                                        <a class="btn btn-sm btn-primary " href="{{ route('confirmaciones.show',$confirmacione->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                        @endcan
                                                        @can('editar-confirmacion')
                                                        <a class="btn btn-sm btn-success" href="{{ route('confirmaciones.edit',$confirmacione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-confirmacion')
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
                                {!! $confirmaciones->links() !!}
                            </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
