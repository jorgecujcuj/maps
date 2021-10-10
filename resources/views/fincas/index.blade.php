@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Fincas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
                        
                            @can('crear-finca')
                            <a class="btn btn-warning" href="{{ route('fincas.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                        <thead style="background-color:#515151">                                     
                                            <th style="display: none;">ID</th>
                                            <th style="color:#fff;">Codigo</th>
                                            <th style="color:#fff;">Nombre</th>
                                            <th style="color:#fff;">Administracion</th>                                    
                                            <th style="color:#fff;">Idruta</th>
                                            <th style="color:#fff;">Acciones</th>                                                                    
                                    </thead>
                                    <tbody>
                                    @foreach ($fincas as $finca)
                                    <tr>
                                        <td style="display: none;">{{ $finca->id }}</td>                                
                                        <td>{{ $finca->codigo }}</td>
                                        <td>{{ $finca->nombre }}</td>
                                        <td>{{ $finca->administracion }}</td>
                                        <td>{{ $finca->idruta }}</td>
                                        <td>
                                            <form action="{{ route('fincas.destroy',$finca->id) }}" method="POST">                                        
                                                @can('editar-finca')
                                                <a class="btn btn-info" href="{{ route('fincas.edit',$finca->id) }}">Editar</a>
                                                @endcan

                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-finca')
                                                <button type="submit" class="btn btn-danger">Borrar</button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $fincas->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
