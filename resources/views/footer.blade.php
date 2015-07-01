@section('footer')
<div id="footer">
	<div class="collumn">
		<div id="footMenu">
			<ul>
			    <li>Contacto</li>
			    <a href="{{URL::to('registrar-mi-empresa')}}"><li>Registrar Empresa</li></a>
			    <li>Nosotros</li>
			</ul>
		</div>
	</div>
	<div class="collumn wigo">
		Powered by Wigo
	</div>
	<div class="collumn">
		<a href="#"><span class="social fb "><i class="fa fa-facebook"></i></span></a>
		<a href="#"><span class="social twitter"><i class="fa fa-twitter"></i></span></a>
	</div>
</div>
@stop