@section('login_register')
	<div id="login_register">
		<div id="login" class="showUp">
			<span id="closeLogin" class="closeBtn" onclick="hideForm(0)">x</span>
			<form action="login" name="loginForm" id="loginForm" method="POST" class="form-estilizado">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="text" name="login_user" id="login_user" placeholder="Ingrese su usuario">
				<input type="password" name="login_password" id="login_password" placeholder="Ingrese su contraseña">
				<a href="{{ URL::to('facebook') }}"><img src="{{ URL::to('img/BotonLoginFacebook.png') }}" alt="Login con Facebook" title="Login con Facebook"></a><br>
				<input type="submit" value="Ingresar">
			</form>
		</div>
		<div id="register" class="showUp">
			<span id="closeRegister" class="closeBtn" onclick="hideForm(1)">x</span>
			<form action="register" name="registerForm" id="registerForm" method="POST" class="form-estilizado">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="text" name="register_user" id="register_user" placeholder="Ingrese su usuario">
				<input type="text" name="register_name" id="register_name" placeholder="Ingrese sus nombres">
				<input type="text" name="register_apellidos" id="register_apellidos" placeholder="Ingrese sus apellidos">
				<input type="mail" name="register_mail" id="register_mail" placeholder="Ingrese su correo electronico">
				<input type="password" name="register_password" id="register_password" placeholder="Ingrese su contraseña">
				<input type="submit" value="Registrarse">
			</form>
		</div>
	</div>
@stop