@foreach($productos as $producto)
	<div class="resultado">
		<a href="{{ URL::to('empresas/'.$producto->slug) }}">
			<span  class="item-categoria"><img src="{{ URL::to($producto->logo_url) }}"></span>
		</a>
		<a href="{{ URL::to('empresas/'.$producto->slug.'/productos/'.$producto->codigo) }}">
			<span class="item-categoria"><img src="{{ URL::to($producto->imagen_url) }}" alt="{{ URL::to($producto->denominacion) }}"></span>
		</a>
		<a href="{{ URL::to('empresas/'.$producto->slug.'/productos/'.$producto->codigo) }}">
			<span class="texto inline-block">{{ $producto->denominacion }}</span>
		</a>
	</div>
@endforeach