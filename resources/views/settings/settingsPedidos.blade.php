@extends('settings.index')
@section('setting')
	@if(count($pedidos_detallados)<=0)
		<h1 class="pacifico red">Todavía no hiciste ningun pedido</h1>
	@else
		<style>
			.pedido_detalle{
				display: none;
			}
		</style>
		<script>
			$(document).ready(function() {
				$('.pedidos_pedido').click(function () {
					var id = $(this).attr('id');
					$('.' + id).toggle('fast');
				});
			});
		</script>
		<h1 class="pacifico red">Listado de todos tus pedidos</h1>
		<span class="lato font-20px">Clica en los items para obtener el detalle del pedido.</span>
		<table class="lato font-20px">
			<tr>
				<td>Codigo</td>
				<td>Importe Total</td>
				<td>Hora y Fecha de Registro</td>
				<td>Estado del Pedido</td>
			</tr>
		@foreach($pedidos_detallados as $pedido)
			<tr class="pedidos_pedido" id="pedido{{ $pedido['pedido_codigo'] }}">
				<td>{{ $pedido['pedido_codigo'] }}</td>
				<td>{{ Moneda::guaranies($pedido['grupo'][0]['importe_total']) }}</td>
				<td>{{ $pedido['grupo'][0]['fecha_registro'] }}</td>
				<td>{{ $pedido['grupo'][0]['estado'] }}</td>
			</tr>
			@foreach($pedido['grupo'] as $detalle)
				<tr class="pedido_detalle pedido{{ $pedido['pedido_codigo'] }}">
					<td>Detalle</td>
					<td>{{ $detalle['producto_descripcion'] }}</td>
					<td>Cantidad: {{ $detalle['cantidad'] }}</td>
					<td>Precio: {{ Moneda::guaranies($detalle['precio']) }}</td>
				</tr>
			@endforeach
		@endforeach
		</table>
	@endif
@stop