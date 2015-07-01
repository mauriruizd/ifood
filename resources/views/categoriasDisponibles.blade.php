@extends('user')
@section('page-content')
	<div id="center">
		@foreach($categorias as $categoria)
			<img src="{{ URL::to($categoria->logo) }}" alt="{{ $categoria->nombre }}">
		@endforeach
		{!! $categorias->render() !!}
	</div>
@stop