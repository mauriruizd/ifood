@extends('user')
@section('page-content')
	<div id="center">
		@if(isset($error))
			<span class="texto red"><h1>{{ $error }}</h1><a href="{{ URL::to('categorias') }}"> <i class="fa fa-reply"></i>Volver a categorias</a></span>
		@else
			<span class="texto red"><h1>{{ $categoria->nombre }}</h1><a href="{{ URL::to('categorias') }}"> <i class="fa fa-reply"></i>Volver a categorias</a></span>
			@foreach($empresas as $empresa)
				<a href="{{ URL::to('empresas/'.$empresa->slug) }}"><span class="item-categoria">
					<img src="{{ URL::to($empresa->logo_url) }}" alt="{{ $empresa->nombre }}">
				</span></a>
			@endforeach
		@endif
	</div>
@stop