@extends('user')
@section('page-content')
	<div id="center">
		@if(isset($error))
			<h1>{{ $error }}</h1><span class="texto red"><a href="{{ URL::to('empresas') }}"><i class="fa fa-reply"></i>Volver a menu empresas</a></span>
		@else
			<h1>{{ $producto->titulo }}</h1><br>
			<hr>
			<div id="producto">
				<div id="imagen_producto">
					<img src="{{ URL::to($producto->imagen_url) }}" alt="{{ $producto->titulo }}" class="icono-big">
				</div>
				<div id="descripcion_producto">
					<h1>Descripción del producto</h1>
					<span class="texto">{{ $producto->descripcion }}</span>
				</div>
			</div>
			<div id="carrito" class="texto">
				Precio: Gs: {{ $producto->precio }} <br>
				<div id="spinner">
					<div id="spinner-number">
						<input type="text" disabled name="spinner-value" id="spinner-value" value="1">
					</div>
					<div id="spinner-arrows">
						<span id="spinner-arrow-up"><i class="fa fa-angle-up"></i></span>
						<span id="spinner-arrow-down"><i class="fa fa-angle-down"></i></span>
					</div>
				</div>
				<a href="{{ URL::to('carrito/add/'.$producto->codigo) }}" id="cartClick"><i class="fa fa-cart-plus red fa-2x"></i></a>
			</div>
			<br><span class="texto red"><a href="{{ URL::to('empresas/'.$empresa) }}"><i class="fa fa-reply"></i>Volver</a></span>
		@endif
	</div>
	<script>
		var spinner = {
			'value' : document.getElementById("spinner-value"),
			'up' : document.getElementById("spinner-arrow-up"),
			'down' : document.getElementById("spinner-arrow-down")
		}

		spinner.up.addEventListener("click", function(){
			if(spinner.value.value > 9)
				return;
			spinner.value.value++;
		});
		spinner.down.addEventListener("click", function(){
			if(spinner.value.value < 2)
				return;
			spinner.value.value--;
		});

		document.getElementById("cartClick").addEventListener("click", function(e){
			e.preventDefault();
			document.getElementById("cartClick").href += "/" + spinner.value.value;
			location.assign(document.getElementById("cartClick").href);
			//console.log(document.getElementById("cartClick").href);
		});
	</script>
@stop