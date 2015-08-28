@extends("admin.index")
@section("contenido")

<style>
    .bg{
        font-size: 25px;
      font-weight: bold;

        color: #ffffff;
        background: #8a0808;
        padding: 10px;

    }
    #geoloc{
       width: 500px;
        height: 500px;
    }

</style>
    {!! Form::open() !!}



    <div id="caja3">
        <h3 class="bg" ># {{$empresa->denominacion}}</h3>
        <br>
        <h3 class="titulo_sabor" >Logo</h3>

        {!! Form::file('image',['id'=>'file-1','class'=>'file']) !!}
        <h3 class="titulo_sabor" >Direccion</h3>
        {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'', 'required']) !!}


        <h3 class="titulo_sabor" >Telefono</h3>
        {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'']) !!}


        <h3 class="titulo_sabor" >Email</h3>
        {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'']) !!}


        <h3 class="titulo_sabor" >Costo Delivery</h3>
        {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'']) !!}


        <h3 class="titulo_sabor" >Radio de Cobertura</h3>
        <div id="caja1">
        <input type="number" min="1" max="100" value="1" class="form-control" />
        </div>
        <br> <br>
        <h3 class="titulo_sabor" >Localizacion de la Empresa</h3>
        <div id="mapa">
            <span></span>
        </div>
        <br>
        <div id="caja1">
            {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
        <script src="{{URL::to('js/map.js')}}"></script>
        <script>
            setMap('mapa',0);
            initMap();
            google.maps.event.addListenerOnce(map, 'tilesloaded', function(){
                clearInfos();
                var posicion = new google.maps.LatLng({{ $empresa->latitud }}, {{ $empresa->longitud }});
                setInfo(posicion, 'Aquí está tu empresa?');
            });
        </script>




        {!! Form::close() !!}

    </div>






@stop