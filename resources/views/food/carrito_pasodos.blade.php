@extends('user')
@section('page-content')
	<div id="center">
		@if(Session::has('msg'))
			<span class="msg">{{ Session::get('msg') }}</span>
		@endif
		@if(count($direcciones) > 0)
			<h1>Selecciona entre tus direcciones.</h1>
			<form action="{{ URL::to('carrito/seleccionarDireccion') }}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<table class="tabla-collapse">
				<thead>
					<tr>
						<td>
							Perfil
						</td>
						<td>
							Direccion
						</td>
						<td>
							&nbsp;
						</td>
					</tr>
				</thead>
			@foreach ($direcciones as $direccion)
				<tr>
					<td>{{ $direccion->nombre }}</td>
					<td>{{ $direccion->direccion }}</td>
					<td><input type="radio" name="direccion" value="{{ $direccion->codigo }}"></td>
				</tr>
			@endforeach
			</table>
			<input type="submit" value="Siguiente Paso" class="form-submit-only">
			</form>
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
	@if(count($direcciones) > 0)
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
	<script src="{{ URL::to('js/map.js') }}"></script>
	<script>
		setMap("form-direccion", 6);
		initMap();
	</script>
	@endif
@stop