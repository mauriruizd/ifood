@extends('user')
@section('page-content')
	<div id="center">
		<h1>Puedes elegir entre estas categorias!</h1><br>
		@foreach($categorias as $categoria)
			<a href="{{ URL::to('categorias/'.$categoria->slug) }}"><span class="item-categoria"><img src="{{ URL::to($categoria->imagen_url) }}" alt="{{ $categoria->nombre }}"></span></a>
		@endforeach
	</div>
@stop