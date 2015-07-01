@extends('user')
@section('page-content')
<div class="center">
	<form action="registrar-mi-empresa" id="reg_empresa_form" method="POST" class="form-estilizado">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" id="nombre_empresa_register" name="nombre_empresa_register" placeholder="Nombre de la Empresa">
		<input type="text" id="telefono_empresa_register" name="telefono_empresa_register" placeholder="Telefono de la Empresa">
		<input type="text" id="direccion_empresa_register" name="direccion_empresa_register" placeholder="Direccion de la Empresa">
		<input type="mail" id="email_empresa_register" name="email_empresa_register" placeholder="Email de la Empresa">
		<input type="text" id="precio_empresa_register" name="precio_empresa_register" placeholder="Costo del delivery de la Empresa">
		<label>Radio de disponibilidad del delivery:<span id="del"></span> Km.</label>(Representado por el circulo rojo)
		<input type="range" id="radio_delivery" name="radio_delivery" min="1" max="8" value="1">
		<label>Categorias de la empresa (Máximo dos)</label>
		@foreach($categorias as $categoria)
			<input type="checkbox" onchange="checkcats(this)" value="{{ $categoria->id }}">{{ $categoria->nombre }}
		@endforeach
		<input type="submit" id="submit_registrar_empresa" value="Enviar Pedido de Registro">
	</form>
</div>
<style>
	#geoloc{
		height: 500px!important;
	}
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<script src="js/map.js"></script>
<script>
	setMap("reg_empresa_form", 10);
	initMap(true);
	categorias = {
		selected : 0,
		categorias : []
	};
	changeDelivery();
	
	document.getElementById("radio_delivery").addEventListener("change", function(){
		changeDelivery();
		changeRadius(document.getElementById("radio_delivery").value);
	});
	
	document.getElementById("submit_registrar_empresa").addEventListener("click", function(){
		var inputCategorias = createHiddenField("categorias");
		inputCategorias.value = JSON.stringify(categorias.categorias);
		document.getElementById("reg_empresa_form").appendChild(inputCategorias);
	});

	function changeDelivery(){
		document.getElementById("del").innerHTML = document.getElementById("radio_delivery").value;
	}

	function checkcats(trigger){
		if(trigger.checked == true){
			if (categorias.selected > 1){
				trigger.checked = false;
				window.alert('Maximo dos categorias.');
				return false;
			}
			categorias.selected++;
			categorias.categorias.push(trigger.value);
		} else {
			categorias.selected--;
			if (trigger.value == categorias.categorias[categorias.selected]){
				categorias.categorias.pop();
			} else {
				categorias.categorias.shift();
			}
		}
	}
</script>
@stop