<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tengo Hambre</title>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{URL::to('css/style.css')}}">
	<link rel="stylesheet" href="{{URL::to('css/font-awesome.css')}}">
	<link rel="icon" href="{{URL::to('img/favicon-red.ico')}}">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
<div id="wrap">
	<div id="top-nav">
		<div class="center">
			<a href="{{ URL::to('login') }}" class="logo">
				<img src="{{ URL::to('img/logo-sin-moto.png') }}" alt="Delcheff" title="Delcheff">
			</a>
			@if (Session::has('hungry_user'))
				<div id="barra_top" class="right">
					<span class="right" id="saludo">
						<span class="hi">Hola {{ Session::get('hungry_user')->nombres }} </span>
						<a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i></a>
						<a href="{{ URL::to('settings') }}"><i class="fa fa-cog"></i></a>
						<a href="{{ URL::to('carrito') }}"><i class="fa fa-shopping-cart"></i>( {{ count(Session::get('carrito.items')) }} )</a>
						<a href="#" class="sidemenubtn"><i class="fa fa-bars"></i></a>
					</span>
				</div>
			@endif
		</div>
	</div>
	<div id="sidemenu">
		<ul>
			<a href="{{ URL::to('login') }}"><li>Inicio</li></a>
			<a href="{{ URL::to('empresas') }}"><li>Empresas</li></a>
			<a href="{{ URL::to('categorias') }}"><li>Categorias</li></a>
			<a href="{{ URL::to('favoritos') }}"><li>Favoritos</li></a>
		</ul>
	</div>
	<div id="page-content">
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
	</div>
	<script>
		$('#page-content').on('click', function(){
			$('#sidemenu').animate({height: '0'}, 100);
		});
		$('.sidemenubtn').on('click', function(e){
			e.preventDefault();
			if($('#sidemenu').height() == '183'){
				$('#sidemenu').animate({
					height: '0'
				}, 100);
				return;
			}
			$('#sidemenu').animate({
				height: '183px'
			}, 100)
		});
		/*
		 document.getElementById("page-content").addEventListener("click", function(){
		 document.getElementById("sidemenu").style.height = '0';
		 });
		 document.getElementsByClassName("sidemenubtn")[0].addEventListener("click", function(e){
		 e.preventDefault();
		 if(document.getElementById("sidemenu").clientHeight == 0){
		 document.getElementById("sidemenu").style.height = 'initial';
		 } else {
		 document.getElementById("sidemenu").style.height = '0';
		 }
		 });*/
	</script>
	@include('footer')
	@yield('footer')
</div>
</body>
</html>