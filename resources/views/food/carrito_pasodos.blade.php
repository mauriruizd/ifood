@extends('user')
@section('page-content')
	<div id="center">
		@if(count($direcciones) > 0)
			<h1>Selecciona entre tus direcciones.</h1>
			<table class="tabla-collapse">
			@foreach ($direcciones as $direccion)
				<tr class="no-borders">
					<td class="keep-left">{{ $direccion->nombre }}</td>
					<td class="keep-left">{{ $direccion->direccion }}</td>
					<td class="keep-right"><input type="radio" name="direccion" onchange="seleccionarDireccion({{ $direccion->codigo }})"></td>
				</tr>
			@endforeach
			</table>
			<a href="{{ URL::to('settings/add/direccion') }}"><span class="texto red"><i class="fa fa-plus-square-o"></i>Agrega otra direccion.</span></a>
		@else
			<h1>No tienes direcciones guardadas. Aprovecha y guarda una.</h1>
			<form action="{{ URL::to('settings/add/direccion/') }}" method="POST" id="form-direccion" accept-charset="utf-8" class="form-estilizado">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="text" name="nombre_direccion" placeholder="Nombre de la direccion">
				<input type="text" name="direccion_direccion" placeholder="Dirección específica">
				<input type="submit" value="Registrar Dirección">
			</form>
		@endif
	</div>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
	<script src="{{ URL::to('js/map.js') }}"></script>
	<script>
		setMap("form-direccion", 6);
		initMap();
		function seleccionarDireccion(id){
			location.assign("{{ URL::to('/') }}/seleccionarDireccion/" + id);
		}
	</script>
@stop