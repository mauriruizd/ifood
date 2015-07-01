@extends('user')
@section('page-content')
<div class="center">
	<form method="POST" action="nueva-categoria" class="form-estilizado" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="nombre_categoria" placeholder="Nombre de la categoria">
		<input type="text" name="slug_categoria" placeholder="Slug de la categoria">
		<input type="file" name="logo_categoria">
		<input type="submit" value="Agregar Categoria">
	</form>
</div>
@stop