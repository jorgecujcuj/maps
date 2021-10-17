@extends('layouts.app')

@section('template_title')
    {{ $solicitude->name ?? 'Show Solicitude' }}
@endsection

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Unidades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                            <div class="form-group">
                                <strong>Idfinca:</strong>
                                {{ $solicitude->idfinca }}
                            </div>
                            <div class="form-group">
                                <strong>Idpiloto:</strong>
                                {{ $solicitude->idpiloto }}
                            </div>
                            <div class="form-group">
                                <strong>Fecha solicitada:</strong>
                                {{ $solicitude->fechasolicitada}}
                            </div>
                            <div class="form-group">
                                <strong>Telefono:</strong>
                                {{ $solicitude->telefono }}
                            </div>
                            <div class="form-group">
                                <strong>Observacion:</strong>
                                {{ $solicitude->observacion }}
                            </div>

                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('solicitudes.index') }}"> Regresar</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
