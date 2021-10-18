@extends('layouts.app')

@section('template_title')
    Create Programado
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Programar Solicitud </h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('programados.store') }}"  role="form" enctype="multipart/form-data">
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
