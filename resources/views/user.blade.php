<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DelCheff</title>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{URL::to('css/style.css')}}">
	<link rel="stylesheet" href="{{URL::to('css/font-awesome.css')}}">
	<link rel="icon" href="{{URL::to('favicon.ico')}}">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
	<div id="wrap">
		<div id="top-nav">
			<div class="center">
				<a href="{{ URL::to('inicio') }}" class="logo">
					<img src="{{ URL::to('img/logo-sin-moto.png') }}" alt="Delcheff" title="Delcheff">
				</a>
				@if (Session::has('hungry_user'))
				<div id="barra_top" class="right-important inner-20">
					<span id="saludo">
						<span class="hi">Hola {{ Session::get('hungry_user')->nombres }} </span>
						<a href="{{ URL::to('salir') }}"><span class="show-on-hover">Salir</span> <i class="fa fa-sign-out"></i></a>
						<a href="{{ URL::to('settings') }}"><span class="show-on-hover">Ajustes</span> <i class="fa fa-cog"></i></a>
						<a href="{{ URL::to('carrito') }}"><span class="show-on-hover">Carrito</span> <i class="fa fa-shopping-cart"></i>( {{ count(Session::get('carrito.items')) }} )</a>
						<a href="#" class="sidemenubtn"><span class="show-on-hover">Menu</span> <i class="fa fa-bars"></i></a>
					</span>
				</div>
				@endif
			</div>
		</div>
		<div id="sidemenu">
			<ul>
				<a href="{{ URL::to('inicio') }}"><li>Inicio</li></a>
				<a href="{{ URL::to('empresas') }}"><li>Empresas</li></a>
				<a href="{{ URL::to('categorias') }}"><li>Categorias</li></a>
				<a href="{{ URL::to('favoritos') }}"><li>Favoritos</li></a>
			</ul>
		</div>
		<div id="page-content">
			@yield('page-content')
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
		</script>
		@include('footer')
		@yield('footer')
	</div>
</body>
</html>