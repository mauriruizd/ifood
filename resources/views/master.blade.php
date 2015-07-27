<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tengo Hambre</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="{{URL::to('css/font-awesome.css')}}">
	<link rel="icon" href="img/favicon-red.ico">
</head>
<body>
<div id="wrap">	
	@yield('contenido')
	@include('footer')
	@yield('footer')
</div>
</body>
</html>