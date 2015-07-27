@extends('user')
@section('page-content')
	<div id="menu">
		<ul class="nav">
			<a href="{{ URL::to('settings/generales') }}"><li><i class="fa fa-cog fa-2x"></i><br>Generales</li></a>
			<a href="{{ URL::to('settings/pedidos') }}"><li><i class="fa fa-file-text fa-2x"></i><br>Pedidos</li></a>
			<a href="{{ URL::to('settings/direcciones') }}"><li><i class="fa fa-map-marker fa-2x"></i><br>Direcciones</li></a>
			<a href="{{ URL::to('settings/favoritos') }}"><li><i class="fa fa-star fa-2x"></i><br>Favoritos</li></a>
		</ul>
	</div>
	<div id="body">
		@if(Session::has('msg'))
		<span class="lato red font-20px">{{ Session::get('msg') }}</span>
		@endif
		@yield('setting')
	</div>
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/settings.css') }}">
<script>
	var current = location.pathname.split('/');
	$('.nav').children().each(function(index){
		if($(this).html().toLowerCase().indexOf(current[current.length-1]) != -1){
			$(this).children('li:first').addClass('actual');
		}
	});
</script>
@stop