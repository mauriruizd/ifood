@extends('user')
@section('page-content')
	<div id="center">
		@if(Session::has('msg'))
			<span class="msg">{{ Session::get('msg') }}</span>
		@endif
		<a href="{{ URL::to('empresas') }}" class="texto red"><i class="fa fa-reply"></i>Volver a empresas</a><br>
		<span class="item-categoria">
			<img src="{{ URL::to($empresa->logo_url) }}" alt="{{ $empresa->nombre }}">
		</span>
		<h1>{{$empresa->denominacion}}</h1>
		@foreach($productos as $categoria)
			<h1>{{ $categoria['nombre'] }} <i class="fa fa-chevron-circle-down pointer" onclick="hideProducts('{{ $categoria['nombre'] }}')"></i></h1>
			<div id="{{ $categoria['nombre'] }}" class="hiddable">
				@foreach ($categoria['grupo'] as $producto)
					<span class="inline-block">
						<a href="{{ URL::to('empresas/'.$empresa->slug.'/productos/'.$producto['codigo']) }}" class="item-categoria">
							<img src="{{ URL::to($producto['imagen_url']) }}" alt="{{ $producto['denominacion'] }}">
						</a>
						<span class="texto">
							@if ($producto['precio'] > 0)
								{{ Moneda::guaranies($producto['precio']) }}
							@else
								Elija config.
							@endif
						</span>
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