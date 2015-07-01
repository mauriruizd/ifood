@extends('user')
@section('page-content')
	<div id="center">
		<h1>Bienvenido {{ $empresa->nombre }}!</h1>
		<div>
			<div id="lateral-empresa">
				<ul>
				    <li>Dashboard</li>
				    <li>Configuraciones</li>
				    <li></li>
				    <li></li>
				</ul>
			</div>
		</div>
	</div>
@stop