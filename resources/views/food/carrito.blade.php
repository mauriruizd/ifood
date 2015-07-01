@extends('user')
@section('page-content')
	<div id="center">
		@if(count($pedidos['items']) > 0)
		<table class="tabla-collapse degradegris">
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
				<?php
					$subtotal = 0;
				?>
				@foreach($pedidos['items'] as $pedido)
				<tr>
					<td>
						<a href="{{ URL::to('empresas/'.$pedido['producto']->slug) }}">
							<img src="{{ URL::to($pedido['producto']->logo_url) }}" class="item-categoria">
						</a>
					</td>
					<td>
						<a href="{{ URL::to('empresas/'.$pedido['producto']->slug.'/productos/'.$pedido['producto']->codigo) }}">
							<img src="{{ URL::to($pedido['producto']->imagen_url) }}" class="item-categoria">
						</a>
					</td>
					<td>{{ $pedido['producto']->denominacion }}</td>
					<td>{{ $pedido['cantidad'] }}</td>
					<td>{{ $pedido['producto']->precio }}</td>
					<td><a href="{{ URL::to('carrito/remove/'.$pedido['producto']->codigo) }}"><i class="fa fa-times red"></i></td>
				</tr>
				<?php
					$subtotal += $pedido['producto']->precio * $pedido['cantidad'];
					Session(['carrito.subtotal' => $subtotal]);
				?>
				@endforeach
				<tr class="no-borders">
					<td class="keep-left"></td>
					<td></td>
					<td>Subtotal</td>
					<td></td>
					<td></td>
					<td class="keep-left keep-right">{{ $subtotal }}</td>
				</tr>
				<tr class="no-borders">
					<td class="keep-left"></td>
					<td></td>
					<td>Delivery</td>
					<td></td>
					<td></td>
					<td class="keep-left keep-right">{{ $pedidos['delivery'] }}</td>
				</tr>
				<tr class="no-borders">
					<td class="keep-left"></td>
					<td></td>
					<td>Total</td>
					<td></td>
					<td></td>
					<td class="keep-left keep-right"><strong>{{ $pedidos['delivery'] + $subtotal }}<strong></td>
				</tr>
			</tbody>
		</table>
		<a href="{{ URL::to('carrito/pasodos') }}"><input type="button" value="Proceder" class="form-submit-only"></a>
		@else
			<h1>Sin productos en el carrito. <a href="{{ URL::to('login') }}">Puede seguir pidiendo!</a></h1>
		@endif
	</div>
@stop