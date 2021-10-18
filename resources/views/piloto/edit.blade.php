@extends('layouts.app')

@section('template_title')
    Update Piloto
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Piloto</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('pilotos.update', $piloto->id) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
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
