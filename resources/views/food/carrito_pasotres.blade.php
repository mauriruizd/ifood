@extends('user')
@section('page-content')
	<div id="center">
		<h1>Resumen del pedido</h1>
		<table class="tabla-collapse">
			<tr>
				<td><strong>Cantidad de items</strong></td>
				<td>{{ $items }}</td>
			</tr>
			<tr>
				<td><strong>Subtotal</strong></td>
				<td>{{ $datos['subtotal'] }}</td>
			</tr>
			<tr>
				<td><strong>Costo Delivery</strong></td>
				<td>{{ $datos['delivery'] }}</td>
			</tr>
			<tr>
				<td><strong>Total</strong></td>
				<td>{{ $datos['delivery'] + $datos['subtotal'] }}</td>
			</tr>
			<tr>
				<td><strong>Direccion</strong></td>
				<td>{{ $direccion->direccion }}</td>
			</tr>
		</table>
		<a href="{{ URL::to('carrito/commit') }}">
			<input type="button" value="Concretar Pedido" class="form-submit-only">
		</a>
	</div>
@stop