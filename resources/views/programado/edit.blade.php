@extends('layouts.app')

@section('template_title')
    Update Programado
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar solicitud programada</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('programados.update', $programado->id) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf

                                @include('programado.form')

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
