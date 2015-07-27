@extends('settings.index')
@section('setting')
	<h1 class="pacifico red">Configuraciones Generales</h1>
	<table class="lato font-20px">
		<tr>
			<td>Nombres</td>
			<td>{{ $configuraciones->nombres }}</td>
			<td><button class="input pointer btn-edit"><i class="fa fa-pencil"></i></button></td>
		</tr>
		<tr>
			<td>Apellidos</td>
			<td>{{ $configuraciones->apellidos }}</td>
			<td><button class="input pointer btn-edit"><i class="fa fa-pencil"></i></button></td>
		</tr>
		<tr>
			<td>Contraseña</td>
			<td><i class="lato">Cambiar contraseña</i></td>
			<td><button class="input pointer btn-password"><i class="fa fa-pencil"></i></button></td>
		</tr>
	</table>
	<script>
		$('.pointer').hover(function(){
			$(this).addClass('red');
		}, function(){
			$(this).removeClass('red');
		});
		$('.btn-edit').on('click', function(){
			var prev = $(this).parent().prev();
			var campo = prev.prev().html().toLowerCase();
			var oldCont = prev.html();
			prev.html(makeUpdateForm(campo, oldCont));
			var html ='<input type="submit" value="Actualizar" class="input pointer" onclick="submitForm(this)">';
			$(this).parent().html(html);
		});

		$('.btn-password').on('click', function(){
			var prev = $(this).parent().prev();
			var html = '<form name="update" action="{{ URL::to("/") }}/settings/update/password" method="POST">';
			html += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
			html += '<input type="password" name="password" placeholder="Nueva Contraseña" class="input pass"><br>';
			html += '<input type="password" name="confirm_password" placeholder="Confirmar Contraseña" class="input pass"><br>';
			html += '</form>';
			prev.html(html);
			$(this).parent().html('<input type="submit" value="Actualizar" id="btn-pass-submit" class="input" onclick="submitForm(this)" disabled><br><i id="passChecker" class="lato"></i>');
			checkPassword();
		});

		function makeUpdateForm(campo, valor){
			var html = '<form name="update" action="{{ URL::to("/") }}/settings/update/' + campo + '" method="POST">';
			html += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
			html += '<input type="text" name="updated" value="' + valor + '" class="input">';
			html += '</form>';
			return html;
		}

		function submitForm(element){
			var prev = $(element).parent().prev();
			var form = prev.children('form');
			form.submit();
		}

		function checkPassword(){
			$('.pass').on('keyup', function(){
				var passOne = $('.pass:first').val();
				if(passOne == $('.pass:last').val()){
					$('#passChecker').removeClass('red');
					$('#passChecker').addClass('green');
					$('#passChecker').html('Contrasenas iguales');
					$('#btn-pass-submit').prop('disabled', false);
					$('#btn-pass-submit').addClass('pointer');
				} else {
					$('#passChecker').removeClass('green');
					$('#passChecker').addClass('red');
					$('#passChecker').html('Contrasenas desiguales');
					$('#btn-pass-submit').prop('disabled', true);
					$('#btn-pass-submit').removeClass('pointer');
				}
			})
		}
	</script>
@stop