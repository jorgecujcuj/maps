@extends('layouts.app')

@section('template_title')
    Piloto
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Pilotos</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                    @can('crear-piloto')
                    <a href="{{ route('pilotos.create') }}" class="btn btn-warning">
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
                                    <th style="color:#fff;">No</th>
                                    <th style="color:#fff;">Codigo</th>
									<th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Id Unidad</th>
                                    <th style="color:#fff;">Placa</th>
                                    <th style="color:#fff;">Acciones</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pilotos as $piloto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $piloto->codigo }}</td>
											<td>{{ $piloto->nombre }}</td>
                                            <td>{{ $piloto->idunidad }}</td>
                                            <td>{{ $piloto->unidade->placa }}</td>

                                            <td>
                                                <form action="{{ route('pilotos.destroy',$piloto->id) }}" method="POST">
                                                    @can('ver-piloto')
                                                    <a class="btn btn-primary " href="{{ route('pilotos.show',$piloto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    @endcan
                                                    @can('editar-piloto')
                                                    <a class="btn btn-info" href="{{ route('pilotos.edit',$piloto->id) }}"> Editar</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-piloto')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                        <div class="pagination justify-content-end">
                            {!! $pilotos->links() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
