@extends('user')
@section('page-content')
	<div id="center">
		@if(isset($error))
			<h1>{{ $error }}</h1><span class="texto red"><a href="{{ URL::to('empresas') }}"><i class="fa fa-reply"></i>Volver a menu empresas</a></span>
		@else
			@if( Session::has('error'))
				<span class="msg">{{ Session::get('error') }}</span>
			@endif
			<h1>{{ $producto->denominacion }}
				@if ($favorito > 0)
					<i class="fa fa-star" title="Marcado como favorito"></i>
				@else
					 <i class="fa fa-star-o fav" title="Marcar como favorito"></i>
				@endif

			</h1><br>
			<hr class="red">
			<div id="producto">
				<div id="imagen_producto">
					<img src="{{ URL::to($producto->imagen_url) }}" alt="{{ $producto->titulo }}">
				</div>
				<div id="descripcion_producto">
					<h1>Descripción del producto</h1>
					<span class="comfortaa">{{ $producto->descripcion }}</span>
				</div>
			</div>
			<form action="{{ URL::to('carrito/add') }}" method="POST" id="agregarCarrito">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_prod" value="{{ $producto->codigo }}">
				<div id="carrito" class="texto">
					@if(count($filtrosPizza) > 0)
					<table class="tabla-collapse">
						<tr>
							<td>&nbsp;</td>
							<td><b><i>Masa:</i></b></td>
							<td><b><i>Tamaño:</i></b></td>
							<td><b><i>Precio:</i></b></td>
						</tr>
						{!! $i = 1 !!}
						@foreach ($filtrosPizza as $opcion)
							<tr>
								<td>
									<input type="radio" name="config_pizza" id="config_pizza_{{$i}}" class="config_pizza radio" value="{{ $opcion->config_pizza }}"
									@if ((!is_null($extra)) && ($extra == $opcion->config_pizza) )
										{{ 'checked' }}
									@endif
									>
									<label for="config_pizza_{{$i}}"></label>
								</td>
								<td>{{ $opcion->masa_nombre }}</td>
								<td>{{ $opcion->tamanho_nombre }}</td>
								<td>{{ Moneda::guaranies($opcion->precio) }}</td>
							</tr>
						@endforeach
					</table>
					@else
						Precio: {{ Moneda::guaranies($producto->precio) }} <br>
					@endif
					@if(count($agregados) > 0)
						<table class="tabla-collapse">
							<tr>
								<td>Extra</td>
								<td>Costo</td>
								<td>Agregar</td>
							</tr>
							@foreach($agregados as $agregado)
								<tr>
									<td>{{ $agregado->nombres }}</td>
									<td>{{ Moneda::guaranies($agregado->precio_extra) }}</td>
									<td><input type="checkbox" name="E:{{ $agregado->codigo }}" id="E:{{ $agregado->codigo }}"></td>
								</tr>
							@endforeach
						</table>
					@endif
						<div class="spinner">
							<div class="spinner-number">
								<input type="text" name="spinner-value" readonly="readonly" class="spinner-value" value="1">
							</div>
							<div class="spinner-arrows">
								<span class="spinner-arrow-up"><i class="fa fa-angle-up"></i></span>
								<span class="spinner-arrow-down"><i class="fa fa-angle-down"></i></span>
							</div>
						</div>
				</div>
				<span id="cartClick" style="position: relative; height: 60px; display: inline-block" class="form-submit-only lato">
					<i class="fa fa-cart-plus white" style="vertical-align: middle"></i> Agregar al carrito
					<input type="submit" style="position: absolute;width: 100%; height: 100%; bottom: 0; top: 0; left: 0; right: 0; border: 0; background-color: rgba(0,0,0,0); color: rgba(0,0,0,0); cursor: pointer">
				</span>
			</form>
			<br><span class="texto red"><a href="{{ URL::to('empresas/'.$empresa) }}"><i class="fa fa-reply"></i>Volver</a></span>
		@endif
	</div>
	<script>
		$('.fav').on('click', function(){
			$(this).removeClass('fa-star-o');
			$(this).addClass('fa-star');
			$(this).removeClass('fav');
			$.ajax({
				method : 'POST',
				url : '{{URL::to('settings/add/favorito')}}',
				data : {
					_token : '{{ csrf_token() }}',
					prod_id : '{{ $producto->codigo }}',
				}
			});
		});
		/*var spinner = {
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
		});*/

		/*document.getElementById("cartClick").addEventListener("click", function(e){
			e.preventDefault();
			document.getElementById("cartClick").href += "/" + spinn.value.value;
			if(typeof document.getElementsByClassName('config_pizza') !== 'undefined'){
				configs = document.getElementsByClassName('config_pizza');
				for(var i=0; i < configs.length; i++){
					if (configs[i].checked){
						document.getElementById("cartClick").href += "/" + configs[i].value;
					}
				}
			}
			location.assign(document.getElementById("cartClick").href);
			//console.log(document.getElementById("cartClick").href);
		});*/
		spinner = function(valueDOM, upDOM, downDOM){
			var spinner = {
				value : valueDOM,
				up : upDOM,
				down : downDOM
			};
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
			return spinner;
		};
		spinn = new spinner(document.getElementsByClassName("spinner-value")[0],
		document.getElementsByClassName("spinner-arrow-up")[0], document.getElementsByClassName("spinner-arrow-down")[0]);
	</script>
@stop