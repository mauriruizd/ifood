@include('food.login_register')
@extends('master')
@include('footer')
@section('contenido')
	<div id="page-content">
		@yield('login_register')
		<div id="top">
			<div class="center">
				<div id="barra_top">
					<a href="/"><span class="left logo"><img src="img/logo-sombra-2.png" alt="Delcheff" title="Delcheff"></span></a>
					<span class="right">
						@if(Session::has('hungry_user'))
							<a href="login">Hacé tu pedido {{ Session::get('hungry_user')->nombres }}</a>
							<a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i></a>
							<a href="{{ URL::to('settings') }}"><i class="fa fa-cog"></i></a>
							<a href="{{ URL::to('carrito') }}"><i class="fa fa-shopping-cart"></i>( {{ count(Session::get('carrito.items')) }} )</a>
						@else
						<a href="#" id="btnLogin">Ingresar</a><span class="white no-mobile">|</span><a href="#" id="btnRegister">Registrarse</a>
						@endif
					</span>
					<span class="right">
						<a href="#"><span class="store"><img src="img/app-store.png" alt="Disponible para iOS"></span></a>
						<a href="#"><span class="store"><img src="img/googleplay.png" alt="Disponible para Android"></span></a>
					</span>
				</div>
				<div id="slogan">
					<span class="texto_medio">Pedir tu comida favorita nunca fue tan facil</span>
				</div>
				<div id="pedidos_nuevos">
					<ul class="cuadro_negro">
					    <li>Rodrigo - 2 McPollo Grill ( McDonalds  - hace 2 minutos)</li>
					    <li>Santiago - 15 Pizzas extragrandes ( Mega Pizza - hace 6 minutos )</li>
					    <li>Tiago - 10 Pizzas peperoni grandes ( Pizza Hut - hace 1 minuto )</li>
					    <li>Santiago - 5 Te de jaguarete ka'a ( Tesitos & Cia. )</li>
					</ul>
				</div>
			</div>
			<span class="goDown">&gt;</span>
		</div>

		<div id="center">
			<h1>Facil + Económico -> Perfecto</h1><br>
			<div class="ayudas">
				<span class="icono-big wow bounceInLeft"><img src="img/living.png"></span>
				<span class="texto">Pedí desde la comodidad de tu casa</span>
			</div>
			<div class="ayudas">
				<span class="icono-big wow bounceInLeft"><img src="img/chanchito.png"></span>
				<span class="texto">Sin gastar saldo en llamadas</span>
			</div>
			<div class="ayudas">
				<span class="icono-big wow bounceInLeft"><img src="img/hamburguesa2.png"></span>
				<span class="texto">Hacé tus pedidos a tu gusto y a tu manera</span>
			</div>
			<h1>Quienes están con nosotros</h1>
			<div id="empresas">
				<!--
				<span class="empresa"><img src="img/empresas/logo-mcd.jpg"></span>
				<span class="empresa"><img src="img/empresas/logo-bk.svg"></span>
				<span class="empresa"><img src="img/empresas/logo-kfc.gif"></span>
				<span class="empresa"><img src="img/empresas/logo-pizzahut.jpg"></span>-->
				@foreach($empresas as $empresa)
					<span class="empresa wow flipInX"><img src="{{ URL::to($empresa->logo_url) }}"></span>
				@endforeach
			</div>
		</div>
	</div>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/animate.css') }}">
	<script src="{{ URL::to('js/wow.min.js') }}"></script>
	<script>
		wow = new WOW();
		wow.init();
	</script>
	<script src="js/home.js"></script>
	<script src="js/map.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
@stop