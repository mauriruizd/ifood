@extends('user')
@section('page-content')
	<div id="center">
		<h1>Todas estas empresas estan con nosotros!</h1>
		<span class="texto">Puedes clicar en una para obtener mas información el menú de cada una.</span><br>
		@foreach($empresas as $empresa)
			<a href="{{ URL::to('empresas/'.$empresa->slug) }}"><span class="item-categoria"><img src="{{ URL::to($empresa->logo_url) }}" alt="{{ $empresa->nombre }}"></span></a>
		@endforeach
	</div>
@stop