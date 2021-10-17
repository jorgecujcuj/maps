<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('idfinca') }}
            <select class="form-control" name="idfinca">
                   <option value=""selected disabled> - Selecciona una finca - </option>
                    @foreach ($fincas as $fincas)
                    <option value="{{ $fincas->id }}" {{$fincas->id == $solicitude->idfinca ? 'selected' : ''}} >{{ $fincas->nombre }}</option>
                    @endforeach
            </select>
            @error('idfinca')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('idpiloto') }}
            <select class="form-control" name="idpiloto">
                    <option value="" selected disabled> - Selecciona una Piloto - </option>
                    @foreach ($pilotos as $pilotos)
                    <option value="{{ $pilotos->id }}" {{$pilotos->id == $solicitude->idpiloto ? 'selected' : ''}}>{{ $pilotos->nombre }}</option>
                    @endforeach
            </select>
            @error('idpiloto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="fechasolicitada">Fecha Solicitada
            <input type="datetime-local" class="form-control @error('fechasolicitada') is-invalid @enderror"
            name="fechasolicitada" id="fechasolicitada" value="{{ $solicitude->fechasolicitada }}"
            min="2020-01-01T00:00:00" max="2050-01-01T00:00:00">
            @error('fechasolicitada')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </label>
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $solicitude->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion') }}
            {{ Form::text('observacion', $solicitude->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
