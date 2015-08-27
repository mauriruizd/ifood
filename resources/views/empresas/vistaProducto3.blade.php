@extends('user')
@section('page-content')
	<div id="center">
		<style>
			/* ROUNDED ONE */
			.roundedOne {
				width: 28px;
				height: 28px;
				background: #fcfff4;

				background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
				margin: 20px auto;

				-webkit-border-radius: 50px;
				-moz-border-radius: 50px;
				border-radius: 50px;

				-webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
				-moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
				box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
				position: relative;
			}

			.roundedOne label {
				cursor: pointer;
				position: absolute;
				width: 20px;
				height: 20px;

				-webkit-border-radius: 50px;
				-moz-border-radius: 50px;
				border-radius: 50px;
				left: 4px;
				top: 4px;

				-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
				-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
				box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);

				background: -webkit-linear-gradient(top, #222 0%, #45484d 100%);
				background: -moz-linear-gradient(top, #222 0%, #45484d 100%);
				background: -o-linear-gradient(top, #222 0%, #45484d 100%);
				background: -ms-linear-gradient(top, #222 0%, #45484d 100%);
				background: linear-gradient(top, #222 0%, #45484d 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222', endColorstr='#45484d',GradientType=0 );
			}

			.roundedOne label:after {
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
				filter: alpha(opacity=0);
				opacity: 0;
				content: '';
				position: absolute;
				width: 16px;
				height: 16px;
				background: #00bf00;

				background: -webkit-linear-gradient(top, #00bf00 0%, #009400 100%);
				background: -moz-linear-gradient(top, #00bf00 0%, #009400 100%);
				background: -o-linear-gradient(top, #00bf00 0%, #009400 100%);
				background: -ms-linear-gradient(top, #00bf00 0%, #009400 100%);
				background: linear-gradient(top, #00bf00 0%, #009400 100%);

				-webkit-border-radius: 50px;
				-moz-border-radius: 50px;
				border-radius: 50px;
				top: 2px;
				left: 2px;

				-webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
				-moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
				box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
			}

			.roundedOne label:hover::after {
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
				filter: alpha(opacity=30);
				opacity: 0.3;
			}

			.roundedOne input[type=radio]:checked + label:after {
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
				filter: alpha(opacity=100);
				opacity: 1;
			}

			/* SQUARED FOUR */
			.squaredFour {
				width: 20px;
				margin: 20px auto;
				position: relative;
			}

			.squaredFour label {
				cursor: pointer;
				position: absolute;
				width: 20px;
				height: 20px;
				top: 0;
				left: 0;
				border-radius: 4px;

				-webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
				-moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
				box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
				background: #fcfff4;

				background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
			}

			.squaredFour label:after {
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
				filter: alpha(opacity=0);
				opacity: 0;
				content: '';
				position: absolute;
				width: 9px;
				height: 5px;
				background: transparent;
				top: 4px;
				left: 4px;
				border: 3px solid #333;
				border-top: none;
				border-right: none;

				-webkit-transform: rotate(-45deg);
				-moz-transform: rotate(-45deg);
				-o-transform: rotate(-45deg);
				-ms-transform: rotate(-45deg);
				transform: rotate(-45deg);
			}

			.squaredFour label:hover::after {
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
				filter: alpha(opacity=30);
				opacity: 0.5;
			}

			.squaredFour input[type=checkbox]:checked + label:after {
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
				filter: alpha(opacity=100);
				opacity: 1;
			}
		</style>
		@if(isset($error))
			<h1>{{ $error }}</h1><span class="texto red"><a href="{{ URL::to('empresas') }}"><i class="fa fa-reply"></i>Volver a menu empresas</a></span>
		@else
			@if( Session::has('error'))
				<span class="msg">{{ Session::get('error') }}</span>
			@endif
			<div id="producto">
				<div id="imagen_producto">
					<img src="{{ URL::to($producto->imagen_url) }}" alt="{{ $producto->titulo }}">
				</div>
				<div id="descripcion_producto" style="margin-top: 50px">
					<h1 style="padding: 0;">{{ $producto->denominacion }}
						@if ($favorito > 0)
							<i class="fa fa-star" title="Marcado como favorito"></i>
						@else
							<i class="fa fa-star-o fav pointer" title="Marcar como favorito"></i>
						@endif

					</h1><br>
					<span class="comfortaa">{{ $producto->descripcion }}</span>
					@if(count($filtrosPizza) > 0)
						<?php $i = 1; ?>
						<h1>Config. Pizza</h1>
						@foreach ($filtrosPizza as $opcion)
							<span class="item-categoria lato" style="height: auto!important;">
								Masa: {{ $opcion->masa_nombre }}<br>
								Tamaño: {{ $opcion->tamanho_nombre }}<br>
								Porciones: {{ $opcion->cant_porcion }}<br>
								Sabores: {{ $opcion->cant_sabores }}<br>
								<b>{{ Moneda::guaranies($opcion->precio) }}</b><br>
								<span class="roundedOne">
									<input type="radio" name="config_pizza" id="config_pizza_{{$i}}" class="config_pizza" value="{{ $opcion->config_pizza }}"
										   @if ((!is_null($extra)) && ($extra == $opcion->config_pizza) )
										   {{ 'checked' }}
										   @endif
										   onclick="moreSabores({{ $opcion->cant_sabores }})" >
									<label for="config_pizza_{{$i}}"></label>
								</span>
								<?php $i++; ?>
							</span>
						@endforeach
					@else
						<span class="comfortaa" style="display: block; background: transparent url('{{ URL::to('img/banner-precio.png') }}'); background-position: right; max-width: 600px; color:#FFF; font-size: 20px; margin: 20px 0;">Precio: {{ Moneda::guaranies($producto->precio) }} <br></span>
					@endif
					@if(!is_null($sabores_extras))
						<div id="mas_sabores" style="display: none;">
							<h1>Elija los sabores adicionales (opcional)</h1>
							@foreach($sabores_extras as $sabor)
								<span class="item-categoria lato">
									{{ $sabor->denominacion }}<br>
									<span class="squaredFour">
										<input type="checkbox" class="sabor_extra" name="sabores_extra[]" value="{{ $sabor->codigo }}" id="sabor_pizza_{{ $sabor->codigo }}">
										<label for="sabor_pizza_{{ $sabor->codigo }}"></label>
									</span>
								</span>
							@endforeach
						</div>
					@endif
					@if(count($agregados) > 0)
						<h1 style="padding: 0;">Elija los agregados (opcional)</h1>
						@foreach($agregados as $agregado)
							<span class="item-categoria lato" style="padding-top: 10px">
								{{ $agregado->nombres }}<br>
								<span class="extra-precio">{{ Moneda::guaranies($agregado->precio_extra) }}</span><br>
								<span class="squaredFour">
									<input type="checkbox" name="extras[]" value="{{ $agregado->codigo }}" id="E:{{ $agregado->codigo }}">
									<label for="E:{{ $agregado->codigo }}"></label>
								</span>
							</span>
						@endforeach
					@endif
					<br>
				</div>
			</div>
			<form action="{{ URL::to('carrito/add') }}" method="POST" id="agregarCarrito">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_prod" value="{{ $producto->codigo }}">
				<div id="carrito" class="texto">

				</div>
				<div class="spinner" style="margin-top: 50px;">
					<div class="pointer"><i class="fa fa-plus"></i></div>
					<div><input type="text" readonly="readonly" value="1" id="spinner-value" name="spinner-value"></div>
					<div class="pointer"><i class="fa fa-minus"></i></div>
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
		spinn = new spinner($('#spinner-value')[0], $('.spinner:first div:first')[0], $('.spinner:first div:last')[0]);

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