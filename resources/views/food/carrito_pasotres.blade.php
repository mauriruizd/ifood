@extends('user')
@section('page-content')
	<div id="center">
		<h1>Resumen del pedido</h1>
		<table class="tabla-collapse">
			<thead>
				<tr>
					<td>
						Descripción
					</td>
					<td>
						Detalle
					</td>
				</tr>
			</thead>
			<tr>
				<td><strong>Cantidad de items</strong></td>
				<td>{{ $items }}</td>
			</tr>
			<tr>
				<td><strong>Subtotal</strong></td>
				<td>{{ Moneda::guaranies($datos['subtotal']) }}</td>
			</tr>
			@foreach($datos['delivery'] as $empresa => $costo)
				<tr>
					<td><strong>Delivery {{ $empresa }}</strong></td>
					<td>{{ Moneda::guaranies($costo) }}</td>
				</tr>
			@endforeach
			<tr>
				<td><strong>Total</strong></td>
				<td>{{ Moneda::guaranies($datos['delivery']['total'] + $datos['subtotal']) }}</td>
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