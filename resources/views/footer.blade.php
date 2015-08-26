@section('footer')
<div id="footer">
	<div class="collumn">
		<div id="footMenu">
			<ul>
				<a href="{{ URL::to('contacto') }}"><li>Contacto</li></a>
			    <a href="{{URL::to('registrar-mi-empresa')}}"><li>Registrar Empresa</li></a>
			    <li>Nosotros</li>
			</ul>
		</div>
	</div>
	<div class="collumn wigo">
		<a href="http://www.wigolabs.com">Powered by Wigo</a>
	</div>
	<div class="collumn">
		<a href="https://www.facebook.com/pages/Delcheff/711723628931678?ref=bookmarks"><span class="social fb "><i class="fa fa-facebook"></i></span></a>
		<a href="https://instagram.com/delcheff/"><span class="social instagram"><i class="fa fa-instagram"></i></span></a>
	</div>
</div>
@stop