@extends('layouts.app')

@section('template_title')
    Create Piloto
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Crear Unidades</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('pilotos.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                @include('piloto.form')

                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection