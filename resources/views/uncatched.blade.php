@extends('user')
@section('page-content')
	<div id="center">
		<h1>
			{{$error}} <a href="{{ URL::previous() }}"><i class="fa fa-reply red"></i>Volver</a>
		</h1>
	</div>
@stop