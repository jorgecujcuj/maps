@extends('layouts.app')

@section('template_title')
    Create Ruta
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Crear Ruta</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('rutas.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                @include('ruta.form')

                            </form>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
