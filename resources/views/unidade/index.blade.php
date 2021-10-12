@extends('layouts.app')

@section('template_title')
    Unidade
@endsection

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Unidades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-unidad')
                            <a href="{{ route('unidades.create') }}" class="btn btn-warning">
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
                                        <th style="color:#fff;">id</th>
                                        <th style="color:#fff;">Codigo</th>
                                        <th style="color:#fff;">Placa</th>
                                        <th style="color:#fff;">Capacidad</th>
                                        <th style="color:#fff;">Acciones</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unidades as $unidade)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                
                                                <td>{{ $unidade->id }}</td>
                                                <td>{{ $unidade->codigo }}</td>
                                                <td>{{ $unidade->placa }}</td>
                                                <td>{{ $unidade->capacidad }}</td>

                                                <td>
                                                    <form action="{{ route('unidades.destroy',$unidade->id) }}" method="POST">
                                                        @can('ver-unidad')
                                                        <a class="btn btn-primary " href="{{ route('unidades.show',$unidade->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                        @endcan
                                                        @can('editar-unidad')
                                                        <a class="btn btn-info" href="{{ route('unidades.edit',$unidade->id) }}"> Editar</a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-unidad')
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
                            {!! $unidades->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
