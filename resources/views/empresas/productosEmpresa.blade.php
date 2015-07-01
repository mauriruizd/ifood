@extends('user')
@section('page-content')
	<div id="center">
		<a href="{{ URL::to('empresas') }}" class="texto red"><i class="fa fa-reply"></i>Volver a empresas</a><br>
		<img src="{{ URL::to($empresa->logo_url) }}" alt="{{ $empresa->nombre }}" class="item-categoria"><br>
		<h1>{{$empresa->denominacion}}</h1>
		@foreach($productos as $categoria)
			<h1>{{ $categoria['nombre'] }} <i class="fa fa-chevron-circle-down pointer" onclick="hideProducts('{{ $categoria['nombre'] }}')"></i></h1>
			<div id="{{ $categoria['nombre'] }}" class="hiddable">
				@foreach ($categoria['grupo'] as $producto)
					<span class="inline-block">
						<a href="{{ URL::to('empresas/'.$empresa->slug.'/productos/'.$producto['codigo']) }}"><span class="item-categoria">
								<img src="{{ URL::to($producto['imagen_url']) }}" alt="{{ $producto['denominacion'] }}">
						</span></a>
						<span class="texto">Gs. {{ $producto['precio'] }}</span>
					</span>
				@endforeach
			</div>
		@endforeach
	</div>
	<script>
		function hideProducts(list){

			if(document.getElementById(list).clientHeight == 0){
				document.getElementById(list).style.height = 'auto';
			} else {
				document.getElementById(list).style.height = '0';
			}
		}
	</script>
@stop