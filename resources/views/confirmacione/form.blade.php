<body onload="initialize()">
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('idprogramado') }}
            <select class="form-control" name="idprogramado">
                   <option value=""selected disabled> - Selecciona una solicitud - </option>
                    @foreach ($programados as $programado)
                    <option value="{{ $programado->id }}" {{$programado->id == $confirmacione->idprogramado ? 'selected' : ''}} >{{ $programado->idsolicitud }}</option>
                    @endforeach
            </select>
            @error('idprogramado')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="form-control">Latitud
            <input type="text" class="form-control @error('latitud') is-invalid @enderror"
            name="latitud" id="txtLat" value="{{ $confirmacione->latitud }}"
            style="color:red" >
            @error('latitud')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </label>
        </div>

        <div class="form-group">
            <label for="form-control">Longitud
            <input type="text" class="form-control @error('longitud') is-invalid @enderror"
            name="longitud" id="txtLng" value="{{ $confirmacione->longitud }}"
            style="color:red" >
            @error('longitud')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </label>
        </div>

        <div class="form-group">
            {{ Form::label('abastecida') }}
            {{ Form::text('abastecida', $confirmacione->abastecida, ['class' => 'form-control' . ($errors->has('abastecida') ? ' is-invalid' : ''), 'placeholder' => 'Abastecida']) }}
            {!! $errors->first('abastecida', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $confirmacione->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-danger" href="{{ route('confirmaciones.index') }}"> Regresar</a>
    </div>
</div>
<br><br>
<div class="box box-info padding-1">
    <div class="box-body">
        <div id="map_canvas" style="width: auto; height: 600px;"></div>
    </div>
</div>

</body>

@section('css')
<link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
      integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
      crossorigin=""
/>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script
      src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
      integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
      crossorigin=""
></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9DY04K6SIJModAyyH5uTIp4bWqhe9p6E"></script>
<script type="text/javascript">
        function initialize() {
            if ('geolocation' in navigator) {
                console.log('geolocation available');
                navigator.geolocation.getCurrentPosition(position => {
                //Balidamos si los input estan bacios
                var va1 = $('#txtLat').val().split(' ').join('');
                var va2 = $('#txtLng').val().split(' ').join('');
                if (va1 == '' & va2 == '') {
                  lat = position.coords.latitude;
                  lon = position.coords.longitude;
                }else{
                    lat = va1;
                    lon = va2;
                }
                console.log(lat, lon);

                    // Creando objeto de mapa
                    var map = new google.maps.Map(document.getElementById('map_canvas'), {
                        zoom: 12,
                        //center: new google.maps.LatLng(-34.9206797, -57.9537638),
                        center: new google.maps.LatLng(lat, lon),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    //verificacion si soporta geolocalizacion
                    
                    // crea un marcador que se puede arrastrar a las coordenadas dadas
                    var vMarker = new google.maps.Marker({
                        position: new google.maps.LatLng(lat, lon),
                        draggable: true
                    });

                    // agrega un oyente al marcador
                    // obtiene las coordenadas cuando finaliza el evento de arrastre
                    // luego actualiza la entrada con las nuevas coordenadas 
                    google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                        $("#txtLat").val(evt.latLng.lat().toFixed(6));
                        $("#txtLng").val(evt.latLng.lng().toFixed(6));

                        map.panTo(evt.latLng);
                    });

                    // centra el mapa en marcadores de coordenadas
                    map.setCenter(vMarker.position);

                    // agrega el marcador en el mapa
                    vMarker.setMap(map);

                });
            } else {
                console.log('geolocalizaci??n no disponible');
            }
            
        }
</script>
@endsection
