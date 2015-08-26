<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Llegada de pedidos lokos</title>
	<script src="http://autobahn.s3.amazonaws.com/js/autobahn.min.js"></script>
	<script src="https://js.pusher.com/2.2/pusher.min.js"></script>
	<script>
		/*var subscription = function(categoria){
			conn = new ab.Session('ws://localhost:8080', function(e){
				console.log('Conectado!');
				console.log(e);
				conn.subscribe(categoria, function(topic, data){
					renderPedido(data);
				});
			}, function(){
				console.log('Conexion cerrada.');
			},
			{'skipSubprotocolCheck' : true}
			);
			conn.onopen = function(e){
				console.log(e);
			}
		}
		var socketEmpresa = new subscription('{{ $empresa->socket_server_token }}');
*/
		var pusher = new Pusher('35aa4c752e4b1fa7475f', {
			encrypted: true
		});

		Pusher.log = function(message) {
			if (window.console && window.console.log) {
				window.console.log(message);
			}
		};

		var pedidos = pusher.subscribe('{{ $empresa->socket_server_token }}');
		pedidos.bind('nuevos_pedidos', function(data){
			renderPedido(data);
		});

		function renderPedido(data){
			console.log(data);
			var pedido = data;
			var newDiv = document.createElement('DIV');
			newDiv.innerHTML = '';
			for(var i=0; i < pedido.pedido.length; i++){
				newDiv.innerHTML += '<p><b>Nro. de pedido</b>: ' + i + '</p>';
				newDiv.innerHTML += '<p><b>Item</b>: ' + pedido.pedido[i].item + '</p>';
				newDiv.innerHTML += '<p><b>Cantidad</b>: ' + pedido.pedido[i].cantidad + '</p>';
				newDiv.innerHTML += '<p><b>Precio</b>: ' + pedido.pedido[i].precio + '</p>';
				newDiv.innerHTML += '<p><b>Subtotal</b>: ' + pedido.pedido[i].subtotal + '</p><br>';
			}
			document.body.appendChild(newDiv, document.body);
		}
	</script>
</head>
<body>
	
</body>
</html>