@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Finca</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">     
                                                                      
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                    <form action="{{ route('fincas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="codigo">Codigo:</label>
                                   <input type="text" name="codigo" value="{{ old('codigo') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nombre">Nombre Finca:</label>
                                   <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="administracion">Administracion:</label>
                                   <input type="text" name="administracion" value="{{ old('administracion') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="idruta">Idruta:</label>
                                   <input type="text" name="idruta" class="form-control">
                                </div>
                            </div>   
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                        </div> 
                    </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
