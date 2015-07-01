@extends('user')
@section('page-content')
	<div id="center">
		<h1>Agregue otra dirección.</h1>
		<form action="{{ URL::to('settings/add/direccion/') }}" method="POST" id="form-direccion" accept-charset="utf-8" class="form-estilizado">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="text" name="nombre_direccion" placeholder="Nombre de la direccion">
			<input type="text" name="direccion_direccion" placeholder="Dirección específica">
			<input type="submit" value="Registrar Dirección">
		</form>
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