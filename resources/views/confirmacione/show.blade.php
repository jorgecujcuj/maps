@extends('layouts.app')

@section('template_title')
    {{ $confirmacione->name ?? 'Show Confirmacione' }}
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Ver Confirmaciones</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                            <div class="form-group">
                                <strong>Idprogramado:</strong>
                                {{ $confirmacione->idprogramado }}
                            </div>
                            <div class="form-group">
                                <strong>Latitud:</strong>
                                {{ $confirmacione->latitud }}
                            </div>
                            <div class="form-group">
                                <strong>Longitud:</strong>
                                {{ $confirmacione->longitud }}
                            </div>
                            <div class="form-group">
                                <strong>Abastecida:</strong>
                                {{ $confirmacione->abastecida }}
                            </div>
                            <div class="form-group">
                                <strong>Descripcion:</strong>
                                {{ $confirmacione->descripcion }}
                            </div>

                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('confirmaciones.index') }}"> Regresar</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
