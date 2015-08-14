@extends('user')
@section('page-content')
	<div id="center">
		@if(count($pedidos['items']) > 0)
		<table class="tabla-collapse">
			<thead>
				<tr>
					<th>Empresa</th>
					<th>Producto</th>
					<th class="noventa">Nombre Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pedidos['items'] as $pedido)
				<tr class="item">
					<input type="hidden" class="id_producto" value="{{ $pedido['producto']->codigo }}">
					<td>
						<a href="{{ URL::to('empresas/'.$pedido['producto']->slug) }}" class="item-categoria">
							<img src="{{ URL::to($pedido['producto']->logo_url) }}">
						</a>
					</td>
					<td>
						@if(isset($pedido['configPizza']))
							<a href="{{ URL::to('empresas/'.$pedido['producto']->slug.'/productos/'.$pedido['producto']->codigo) }}?config={{ $pedido['configPizza'] }}" class="item-categoria">
						@else
							<a href="{{ URL::to('empresas/'.$pedido['producto']->slug.'/productos/'.$pedido['producto']->codigo) }}" class="item-categoria">
						@endif
							<img src="{{ URL::to($pedido['producto']->imagen_url) }}">
						</a>
					</td>
					<td>{{ $pedido['producto']->denominacion }}<span class="carrito-extras">{{ $pedido['configExtra']['nombre'] }}</span></td>
					<td>
						<!--<div class="spinner spinner-carrito">
						<div class="spinner-number">
							<input type="text" disabled name="spinner-value" class="spinner-value" value="{{ $pedido['cantidad'] }}">
						</div>
						<div class="spinner-arrows">
							<span class="spinner-arrow-up"><i class="fa fa-angle-up"></i></span>
							<span class="spinner-arrow-down"><i class="fa fa-angle-down"></i></span>
						</div>
					</div>-->
						<div class="spinner">
							<div class="pointer spinner-arrow-up">
								<i class="fa fa-plus"></i>
							</div>
							<div>
								<input type="text" name="spinner-value" class="spinner-value" readonly="readonly" value="{{ $pedido['cantidad'] }}">
							</div>
							<div class="pointer spinner-arrow-down">
								<i class="fa fa-minus pointer"></i>
							</div>
						</div>
					</td>
					<td>{{ Moneda::guaranies($pedido['producto']->precio) }}</td>
					<td><a href="{{ URL::to('carrito/remove/'.$pedido['producto']->codigo) }}"><i class="fa fa-times red"></i></td>
				</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td>Subtotal</td>
					<td></td>
					<td></td>
					<td ><span id="subt">{{ Moneda::guaranies($pedidos['subtotal']) }}</span></td>
				</tr>
				@foreach($pedidos['delivery'] as $empresa => $costo)
					<tr>
						<td></td>
						<td></td>
						<td>Delivery {{ $empresa }}</td>
						<td></td>
						<td></td>
						<td>{{ Moneda::guaranies($costo) }}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td>Total</td>
					<td></td>
					<td></td>
					<td><strong><span id="tot">{{ Moneda::guaranies($pedidos['delivery']['total'] + $pedidos['subtotal']) }}</span><strong></td>
				</tr>
			</tbody>
		</table>
		<a href="{{ URL::to('carrito/pasodos') }}"><input type="button" value="Proceder" class="form-submit-only"></a>
		@else
			<h1>Sin productos en el carrito. <a href="{{ URL::to('inicio') }}">Puede seguir pidiendo!</a></h1>
		@endif
	</div>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script>
		spinner = function(valueDOM, upDOM, downDOM, codigoDOM){
			var spinner = {
				value : valueDOM,
				up : upDOM,
				down : downDOM,
				codigo : (codigoDOM || 0),
				update : function(){
					var ajax = new XMLHttpRequest;
					ajax.onreadystatechange = function () {
						if(ajax.readyState==4 && ajax.status==200){
							var resp = JSON.parse(ajax.responseText);
							$('#subt').html(resp.subtotal);
							$('#tot').html(resp.total);
						}
					}
					ajax.open("GET", "carrito/update/" + this.codigo.value + "/" + this.value.value + '?frmt=true');
					ajax.send();
				}
			}
			spinner.up.addEventListener("click", function(){
				if(spinner.value.value > 9)
					return;
				spinner.value.value++;
				spinner.update();
			});
			spinner.down.addEventListener("click", function(){
				if(spinner.value.value < 2)
					return;
				spinner.value.value--;
				spinner.update();
			});
			return spinner;
		};
		spinners = [];
		$('.item').each(function(index){
			var value = $('.spinner-value')[index];
			var up = $('.spinner-arrow-up')[index];
			var down = $('.spinner-arrow-down')[index];
			var cod = $('.id_producto')[index];
			var newSpinn = new spinner(value, up, down, cod);
			spinners.push(newSpinn);
		});
	</script>
@stop
