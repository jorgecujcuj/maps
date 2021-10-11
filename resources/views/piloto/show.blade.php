@extends('layouts.app')

@section('template_title')
    {{ $piloto->name ?? 'Show Piloto' }}
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Piloto</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <strong>IdPiloto:</strong>
                                {{ $piloto->id }}
                            </div>
                            <div class="form-group">
                                <strong>Codigo:</strong>
                                {{ $piloto->codigo }}
                            </div>
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                {{ $piloto->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>Id Unidad:</strong>
                                {{ $piloto->idunidad }}
                            </div>

                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('pilotos.index') }}"> Regresar</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
