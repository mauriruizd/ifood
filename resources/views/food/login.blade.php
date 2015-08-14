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
		var buscador = {
			counter : 0,
			calls : [],
			input : document.getElementById('quiero'),
			output : document.getElementById('resultados'),
			url : '{{ URL::to('busquedaAjax') }}',
			makeNew : function(){
				if (buscador.input.value !== '') {
					buscador.abort();
					var ajax = new XMLHttpRequest();
					ajax.counter = buscador.counter;
					ajax.onreadystatechange = function(){
						if(ajax.readyState == 4 && ajax.status == 200){
							buscador.respond(ajax.responseText);
						}
					}
					ajax.open('GET', buscador.url + '?busq=' + buscador.input.value, true);
					ajax.send();
					buscador.calls.push(ajax);
					buscador.counter++;
				} else {
					buscador.abort(true);
					buscador.clearOutput();
				}
			},
			respond : function(res){
				buscador.output.innerHTML = res;
			},
			abort : function(all){
				if(typeof all == 'undefined')
					all = false;
				if (buscador.calls.length == 0)
					return;
				for(var i=0; i < buscador.calls.length; i++){
					if(buscador.counter != buscador.calls[i].counter || all) {
						buscador.calls[i].abort();
					}
				}
			},
			clearOutput : function(){
				buscador.output.innerHTML = '';
			}
		};
		$('#quiero').on('keyup', function(){
			setTimeout(buscador.makeNew, 150);
		});

		$('.tab')[0].style.display = 'block';
		$('.filtro').each(function(index){
			$(this).on('click', function(evt){
				$('.tab').hide('fast');
				$('.filtro').removeClass('filtro-seleccionado');
				$(this).addClass('filtro-seleccionado');
				evt.preventDefault();
				$('.tab')[index].style.display = 'block';
			});
		});
	</script>
@stop