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
					 <i class="fa fa-star-o fav pointer" title="Marcar como favorito"></i>
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
							<td><b><i>Masa</i></b></td>
							<td><b><i>Tamaño</i></b></td>
							<td><b><i>Cant. de Porciones</i></b></td>
							<td><b><i>Cant. de Sabores</i></b></td>
							<td><b><i>Precio</i></b></td>
						</tr>
						<?php $i = 1; ?>
						@foreach ($filtrosPizza as $opcion)
							<tr>
								<td>
									<input type="radio" name="config_pizza" id="config_pizza_{{$i}}" class="config_pizza radio" value="{{ $opcion->config_pizza }}"
									@if ((!is_null($extra)) && ($extra == $opcion->config_pizza) )
										{{ 'checked' }}
									@endif
									onclick="moreSabores({{ $opcion->cant_sabores }})" >
									<label for="config_pizza_{{$i}}"></label>
								</td>
								<td>{{ $opcion->masa_nombre }}</td>
								<td>{{ $opcion->tamanho_nombre }}</td>
								<td>{{ $opcion->cant_porcion }}</td>
								<td>{{ $opcion->cant_sabores }}</td>
								<td>{{ Moneda::guaranies($opcion->precio) }}</td>
							</tr>
							<?php $i++; ?>
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
									<td><input type="checkbox" name="extras[]" value="{{ $agregado->codigo }}" id="E:{{ $agregado->codigo }}"></td>
								</tr>
							@endforeach
						</table>
					@endif
						@if(!is_null($sabores_extras))
							<div id="mas_sabores" style="display: none;">
								<table class="tabla-collapse">
									<tr>
										<td>Agregar</td>
										<td>Sabor</td>
									</tr>
									@foreach($sabores_extras as $sabor)
										<tr>
											<td><input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}"></td>
											<td>{{ $sabor->denominacion }}</td>
										</tr>
										<tr>
											<td><input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}"></td>
											<td>{{ $sabor->denominacion }}</td>
										</tr>
										<tr>
											<td><input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}"></td>
											<td>{{ $sabor->denominacion }}</td>
										</tr>
										<tr>
											<td><input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}"></td>
											<td>{{ $sabor->denominacion }}</td>
										</tr><tr>
											<td><input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}"></td>
											<td>{{ $sabor->denominacion }}</td>
										</tr><tr>
											<td><input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}"></td>
											<td>{{ $sabor->denominacion }}</td>
										</tr><tr>
											<td><input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}"></td>
											<td>{{ $sabor->denominacion }}</td>
										</tr>
										<tr>
											<td><input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}"></td>
											<td>{{ $sabor->denominacion }}</td>
										</tr>



									@endforeach
								</table>
								</div>
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
					<i class="fa fa-cart-plus white" style="vertical-align: middle"></i> {{ $estaEnCarrito ? 'Modificar pedido' : 'Agregar al carrito' }}
					<input type="submit" style="position: absolute;width: 100%; height: 100%; bottom: 0; top: 0; left: 0; right: 0; border: 0; background-color: rgba(0,0,0,0); color: rgba(0,0,0,0); cursor: pointer">
				</span>
			</form>
			<br><span class="texto red"><a href="{{ URL::to('empresas/'.$empresa) }}"><i class="fa fa-reply"></i>Volver</a></span>
		@endif
	</div>
	<script>
		sabores = {
			elegidos : 0,
			maximo : 0
		}
		$('.fav').on('click', function(){
			$(this).removeClass('fa-star-o');
			$(this).addClass('fa-star');
			$(this).removeClass('fav');
			$.ajax({
				method : 'POST',
				url : '{{URL::to('settings/add/favorito')}}',
				data : {
					_token : '{{ csrf_token() }}',
					prod_id : '{{ $producto->codigo }}'
				}
			});
		});
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

		function moreSabores(max){
			sabores.elegidos = 0;
			sabores.maximo = max;
			habilitarMasSabores();
		}

		function habilitarMasSabores(){
			$('#mas_sabores').hide();
			$('.sabor_extra').prop('checked', false);
			if(sabores.maximo == 1)
				return;
			$('#mas_sabores').show();
		}
		$('.sabor_extra').on('click', function (evt) {
			switch($(this).prop('checked')){
				case true:
					sabores.elegidos++;
					break;
				case false:
					sabores.elegidos--;
					break;
			}
			if(sabores.elegidos > sabores.maximo){
				$(this).prop('checked', false);
				sabores.elegidos--;
			}
		});
	</script>
@stop