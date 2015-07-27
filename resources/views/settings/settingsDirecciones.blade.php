@extends('settings.index')
@section('setting')
	<h1 class="pacifico red">Administre sus direcciones clicando en los campos</h1>
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	@foreach($direcciones as $direccion)
		<p class="texto">
			<input type="hidden" value="{{ $direccion->codigo }}" class="codigo" name="codigo">
			<input type="text" value="{{ $direccion->nombre }}" class="input nombre" name="nombre">
			<input type="text" value="{{ $direccion->direccion }}" class="input direccion" name="direccion">
			<button class="input pointer btn-check">
				<i class="fa fa-check"></i>
			</button>
			<button class="input pointer btn-delete">
				<i class="fa fa-times"></i>
			</button>
		</p>
	@endforeach
	<a href="{{ URL::to('settings/add/direccion') }}"><span class="texto red"><i class="fa fa-plus-square-o"></i>Agrega otra direccion.</span></a>
	<script src="{{ URL::to('js/settings.js') }}"></script>
@stop