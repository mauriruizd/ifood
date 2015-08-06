@extends('user')
@section('page-content')
	<div class="center" id="center">
		@if(Session::has('msg'))
			<span class="msg">{{ Session::get('msg') }}</span>
		@endif
		<div id="user-ask">
			<input type="text" id="quiero" placeholder="Qué deseas comer hoy?" autofocus>
		</div>
		<div id="resultados">
		</div>
		<div id="categorias">
			<div id="menu-filtros">
				<a href="#" id="menu-cats" class="filtro-seleccionado filtro"><span class="no-mobile">Categorias</span><span class="mobile-only"><i class="fa fa-cutlery"></i></span></a>
				<a href="#" id="menu-empresas" class="filtro"><span class="no-mobile">Empresas</span><span class="mobile-only"><i class="fa fa-building"></i></span></a>
				<a href="#" id="menu-favoritos" class="filtro"><span class="no-mobile">Favoritos</span><span class="mobile-only"><i class="fa fa-star"></i></span></a>
			</div>
			<div id="filtros-activos">
				<div id="filtro-cats" class="tab">
					@foreach($categorias as $categoria)
					<a href="categorias/{{ $categoria->slug }}" class="item-categoria"><img src="{{ $categoria->imagen_url }}" title="{{ $categoria->nombre }}"></a>
					@endforeach
				</div>
				<div id="filtro-empresas" class="tab">
					@foreach($empresas as $empresa)
					<a href="empresas/{{ $empresa->slug }}" class="item-categoria"><img src="{{ $empresa->logo_url }}" title="{{ $empresa->denominacion }}"></a>
					@endforeach
				</div>
				<div id="filtro-empresas" class="tab">
					@if(count($favoritos) > 0)
						@foreach($favoritos as $favorito)
						<a href="empresas/{{ $favorito->slug }}/productos/{{ $favorito->codigo }}" class="item-categoria"><img src="{{ $favorito->imagen_url }}" title="{{ $favorito->denominacion }}"></a>
						@endforeach
					@else
						<h1>Todavia no tiene favoritos</h1>
					@endif
				</div>
			</div>
		</div>
	</div>
	<script>
		var quiero = document.getElementById("quiero");
		var resultados = document.getElementById("resultados");
		var ajaxTimer;
		$('#quiero').on('keyup', function(){
			if ($('#quiero').val() == '')
				return;
			if (typeof ajaxTimer == 'number'){
				clearTimeout(ajaxTimer);
				ajaxTimer = setTimeout(buscar, 300);
			} else {
				ajaxTimer = setTimeout(buscar, 300);
				$('#resultados').html('');
			}
		});

		$('.tab')[0].style.display = 'block';
		$('.filtro').each(function(index){
			$(this).on('click', function(evt){
				$('.tab').hide();
				$('.filtro').removeClass('filtro-seleccionado');
				$(this).addClass('filtro-seleccionado');
				evt.preventDefault();
				$('.tab')[index].style.display = 'block';
			});
		});

		function buscar(){
			var busq = new XMLHttpRequest;
			busq.onreadystatechange = function(){
				if (busq.readyState == 4 && busq.status == 200){
					resultados.innerHTML = busq.responseText;
				}
			}
			busq.open("GET", "{{ URL::to('busquedaAjax') }}?busq=" + quiero.value, true);
			busq.send();
		}

	</script>
@stop