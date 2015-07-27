<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add Pizza</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Tamaños</h1>
	@foreach ($tamanhos as $tamanho)
		{{ $tamanho->nombre }} : {{ $tamanho->codigo }} <br>
	@endforeach
	<form action="addtamanho" method="post" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="nombre" placeholder="nombre">
		<input type="text" name="cant_porcion" placeholder="cant_porcion">
		<input type="text" name="cant_sabores" placeholder="cant_sabores">
		<input type="submit" value="Agregar tamaño">
	</form>
	<h1>Masas</h1>
	@foreach ($masas as $masa)
		{{ $masa->nombre }} : {{ $masa->codigo }} <br>
	@endforeach
	<form action="addmasa" method="post" accept-charset="utf-8">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="nombre" placeholder="nombre">
		<input type="submit" value="Agregar masa">
	</form>
	@unless( (count($masas) == 0) || (count($tamanhos) == 0) )
		<h1>Especialidades</h1>
		@foreach ($especialidades as $especialidad)
			<h2>{{ $especialidad->nombre }} : {{ $especialidad->codigo }}</h2> <br>
			@if( isset($detalles) )
				@foreach ( $detalles as $detalle )
					@if ($detalle->cat_pizza_esp_codigo == $especialidad->codigo)
						Tamaño codigo : {{ $detalle->cat_pizza_tamanho_codigo }}<br>
						Masa codigo : {{ $detalle->cat_pizza_masa_codigo }}<br>
						Precio : {{ $detalle->precio }}<br>
					@endif
				@endforeach
			@endif
			<form action="adddetalle" method="post" accept-charset="utf-8">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="cat_pizza_esp_codigo" value="{{ $especialidad->codigo }}">
				<input type="text" name="cat_pizza_tamanho_codigo" placeholder="cat_pizza_tamanho_codigo">
				<input type="text" name="cat_pizza_masa_codigo" placeholder="cat_pizza_masa_codigo">
				<input type="text" name="precio" placeholder="precio">
				<input type="submit" value="Agregar detalle">
			</form>
		@endforeach
		<form action="addespecialidad" method="post" accept-charset="utf-8">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="text" name="nombre" placeholder="nombre">
			<input type="submit" value="Agregar especialidad">
		</form>
	@endunless
</body>
</html>