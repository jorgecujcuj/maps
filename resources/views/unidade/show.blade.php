@extends('layouts.app')

@section('template_title')
    {{ $unidade->name ?? 'Show Unidade' }}
@endsection

@section('content')
<section class="section">
    <div class="section-header">
            <h3 class="page__heading">Ver Unidad</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <strong>Id:</strong>
                                {{ $unidade->id }}
                            </div>
                            <div class="form-group">
                                <strong>Codigo:</strong>
                                {{ $unidade->codigo }}
                            </div>
                            <div class="form-group">
                                <strong>Placa:</strong>
                                {{ $unidade->placa }}
                            </div>
                            <div class="form-group">
                                <strong>Capacidad:</strong>
                                {{ $unidade->capacidad }}
                            </div>

                            <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('unidades.index') }}">Regresar</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
