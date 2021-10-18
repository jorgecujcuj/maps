@extends('layouts.app')

@section('template_title')
    Create Confirmacione
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Crear una confirmación</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('confirmaciones.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                @include('confirmacione.form')

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
