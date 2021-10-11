@extends('layouts.app')

@section('template_title')
    Update Unidade
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

                            <form method="POST" action="{{ route('unidades.update', $unidade->id) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
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
