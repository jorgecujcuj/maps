@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Finca</h3>
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


                    <form action="{{ route('fincas.update',$finca->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                           
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="codigo">Codigo:</label>
                                   <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $finca->codigo) }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nombre">Nombre:</label>
                                   <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $finca->nombre) }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="administracion">Administracion:</label>
                                   <input type="text" name="administracion" class="form-control" value="{{ old('administracion', $finca->administracion) }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    {{ Form::label('idruta') }}
                                    <select class="form-control" name="idruta">
                                            <option value="" selected disabled> - Selecciona una ruta - </option>
                                            @foreach ($rutas as $ruta)
                                            <option name="idruta" value="{{ $ruta->id }}" {{$ruta->id == $finca->idruta ? 'selected' : ''}} >{{ $ruta->nombre }}</option>
                                            @endforeach
                                    </select>
                                    @error('idruta')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a class="btn btn-danger" href="{{ route('fincas.index') }}"> Regresar</a>
                            </div>
                           
                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
