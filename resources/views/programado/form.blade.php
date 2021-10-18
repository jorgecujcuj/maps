<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idsolicitud') }}
            <select class="form-control" name="idsolicitud">
                   <option value=""selected disabled> - Selecciona una solicitud - </option>
                    @foreach ($solicitudes as $solicitudes)
                    <option value="{{ $solicitudes->id }}" {{$solicitudes->id == $programado->idsolicitud ? 'selected' : ''}} >{{ $solicitudes->fechasolicitada }}</option>
                    @endforeach
            </select>
            @error('idsolicitud')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('operador') }}
            {{ Form::text('operador', $programado->operador, ['class' => 'form-control' . ($errors->has('operador') ? ' is-invalid' : ''), 'placeholder' => 'Operador']) }}
            {!! $errors->first('operador', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $programado->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idfinca') }}
            <select class="form-control" name="idfinca">
                   <option value=""selected disabled> - Selecciona una finca - </option>
                    @foreach ($fincas as $fincas)
                    <option value="{{ $fincas->id }}" {{$fincas->id == $programado->idfinca ? 'selected' : ''}} >{{ $fincas->nombre }}</option>
                    @endforeach
            </select>
            @error('idfinca')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('idunidad') }}
            <select class="form-control" name="idunidad">
                   <option value=""selected disabled> - Selecciona una Unidad - </option>
                    @foreach ($unidades as $unidades)
                    <option value="{{ $unidades->id }}" {{$unidades->id == $programado->idunidad ? 'selected' : ''}} >{{ $unidades->placa }}</option>
                    @endforeach
            </select>
            @error('idunidad')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="salida">Fecha Salida
            <input type="datetime-local" class="form-control @error('salida') is-invalid @enderror"
            name="salida" id="salida" value="{{ $programado->salida }}"
            min="2020-01-01T00:00:00" max="2050-01-01T00:00:00">
            @error('salida')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </label>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{ route('programados.index') }}"> Regresar</a>
    </div>
</div>