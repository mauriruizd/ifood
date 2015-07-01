@extends('user')
@section('page-content')
	<div id="center" class="form-estilizado">
		<div id="acordeon">
			@foreach($campos as $campo=>$valor)
				<div class="collapse collapse-entry">
					<div class="collapse collapse-title">
						{{ $campo }}
					</div>
					<div class="collapse collapse-panel">
						Aqui cambiara uno su {{ $campo }}.<br>
						<input type="text" placeholder="{{ $valor }}">
					</div>
				</div>
			@endforeach
		</div>
			<input type="submit" id="btnSend" value="Cambiar Datos">
		<form name="settings" action="settings" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="update" value="">
		</form>
	</div>
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/settings.css') }}">
<script>
	
	document.getElementById("btnSend").addEventListener("click", function(e){
		e.preventDefault();
		inputs = document.getElementsByTagName("input");
		campos = [];
		for(var i=0; i < inputs.length-3; i++){
			campos[campos.length] = inputs[i].value;
		}
		console.log(JSON.stringify(campos));
	});

	function hideNextElementSibling(elm){
		if(elm.nextElementSibling.clientHeight == 0){
			elm.nextElementSibling.style.height = '200px';
			elm.nextElementSibling.style.padding = '10px 20px';
			return;
		}
		elm.nextElementSibling.style.height = '0px';
		elm.nextElementSibling.style.padding = '0px 20px';
	}

	var titles = document.getElementsByClassName('collapse-title');

	for(var i=0; i < titles.length; i++){
		titles[i].addEventListener("click", function(){
			hideNextElementSibling(this);
		});
	}
</script>
@stop
