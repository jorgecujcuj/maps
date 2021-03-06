@extends('layouts.app')

@section('template_title')
    Create Unidade
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Crear Unidad</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('unidades.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                @include('unidade.form')

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
