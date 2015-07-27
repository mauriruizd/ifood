@extends('settings.index')
@section('setting')
	@if(count($favoritos) <= 0)
		<h1 class="pacifico red">Todavía no tienes favoritos</h1>
	@else
		<h1 class="pacifico red">Elimima los favoritos que ya no usas</h1>
		<table>
			@foreach ($favoritos as $favorito)
				<tr>
					<td>
						<a href="{{ URL::to('empresas/'.$favorito->slug.'/productos/'.$favorito->favoritos_producto_codigo) }}" class="item-categoria">
							<img src="{{ URL::to($favorito->imagen_url) }}" title="{{ $favorito->denominacion }}">
						</a>
					</td>
					<td>
						<a href="{{ URL::to('settings/delete/favorito/'.$favorito->codigo) }}">
							<button class="input btn-delete pointer">
								<i class="fa fa-times"></i>
							</button>
					</td>
				</tr>
			@endforeach
		</table>
		<script>
			$('.pointer').hover(function(){
				$(this).addClass('red');
			}, function(){
				$(this).removeClass('red');
			});
		</script>
	@endif
@stop