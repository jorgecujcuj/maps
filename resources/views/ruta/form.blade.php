<body onload="initialize()">
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $ruta->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $ruta->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <label for="form-control">Latitud
            <input type="text" class="form-control @error('latitud') is-invalid @enderror"
            name="latitud" id="txtLat" value="{{ $ruta->latitud }}"
            style="color:red" >
            @error('latitud')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </label>
        </div>
        <div class="form-group">
            <label for="form-control">Longitud
            <input type="text" class="form-control @error('longitud') is-invalid @enderror"
            name="longitud" id="txtLng" value="{{ $ruta->longitud }}"
            style="color:red" >
            @error('longitud')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </label>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    
</div>
<br><br>
<div class="box box-info padding-1">
    <div class="box-body">
        <div id="map_canvas" style="width: auto; height: 600px;"></div>
    </div>
</div>
</body>

@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

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
                console.log('geolocalización no disponible');
            }
            
        }
</script>
@endsection