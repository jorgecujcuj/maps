@extends('layouts.app')

@section('template_title')
    {{ $programado->name ?? 'Show Programado' }}
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Ver solicitud pramada</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                            <div class="form-group">
                                <strong>Idsolicitud:</strong>
                                {{ $programado->idsolicitud }}
                            </div>
                            <div class="form-group">
                                <strong>Operador:</strong>
                                {{ $programado->operador }}
                            </div>
                            <div class="form-group">
                                <strong>Estado:</strong>
                                {{ $programado->estado }}
                            </div>
                            <div class="form-group">
                                <strong>Idfinca:</strong>
                                {{ $programado->idfinca }}
                            </div>
                            <div class="form-group">
                                <strong>Idunidad:</strong>
                                {{ $programado->idunidad }}
                            </div>
                            <div class="form-group">
                                <strong>Salida:</strong>
                                {{ $programado->salida }}
                            </div>

                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('programados.index') }}"> Regresar</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
