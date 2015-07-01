@extends('user')
@section('page-content')
	<div class="center" id="center">
		<div id="user-ask">
			<input type="text" id="quiero" placeholder="Qué deseas comer hoy?" autofocus>
		</div>
		<div id="resultados">
		</div>
		<div id="categorias">
			<div id="menu-filtros">
				<a href="#" id="menu-cats" class="filtro-seleccionado"><span class="no-mobile">Categorias</span><span class="mobile-only"><i class="fa fa-cutlery"></i></span></a>
				<a href="#" id="menu-empresas"><span class="no-mobile">Empresas</span><span class="mobile-only"><i class="fa fa-building"></i></span></a>
			</div>
			<div id="filtros-activos">
				<div id="filtro-cats">
					@foreach($categorias as $categoria)
					<a href="categorias/{{ $categoria->slug }}"><span class="item-categoria"><img src="{{ $categoria->imagen_url }}" alt="{{ $categoria->nombre }}"></span></a>
					@endforeach
				</div>
				<div id="filtro-empresas">
					@foreach($empresas as $empresa)
					<a href="empresas/{{ $empresa->slug }}"><span class="item-categoria"><img src="{{ $empresa->logo_url }}" alt="{{ $empresa->nombre }}"></span></a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<script>
		var quiero = document.getElementById("quiero");
		var resultados = document.getElementById("resultados");
		var filtros = {
			categorias : document.getElementById("menu-cats"),
			empresas : document.getElementById("menu-empresas")
		}
		quiero.addEventListener("keyup", function(){
			if (quiero.value != ''){
				buscar();
			} else {
				resultados.innerHTML = '';
			}
		});
		filtros.categorias.addEventListener("click", function(e){
			e.preventDefault();
			filtros.categorias.className = 'filtro-seleccionado';
			filtros.empresas.className = '';
			document.getElementById("filtro-empresas").style.display = 'none';
			document.getElementById("filtro-cats").style.display = 'block';
		});
		filtros.empresas.addEventListener("click", function(e){
			e.preventDefault();
			filtros.empresas.className = 'filtro-seleccionado';
			filtros.categorias.className = '';
			document.getElementById("filtro-cats").style.display = 'none';
			document.getElementById("filtro-empresas").style.display = 'block';
		});
		document.getElementById("filtro-cats").style.display = 'block';

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