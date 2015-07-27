@extends('user')
@section('page-content')
	<div id="center">
		@if(count($favoritos) > 0)
			<h1>Disfruta de estos accesos directos a las comidas que más te gustan!</h1>
			@foreach($favoritos as $favorito)
				<a href="{{ URL::to('empresas/'.$favorito->slug.'/productos/'.$favorito->codigo) }}" class="item-categoria"><img src="{{ URL::to($favorito->imagen_url) }}" title="{{ $favorito->denominacion }}"></a>
			@endforeach
		@else
			<h1>Todavía no tienes favoritos</h1>
		@endif
	</div>
@stop