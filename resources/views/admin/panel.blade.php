@extends("admin.index")
@section("contenido")

<!--<section id="main-content">
          <section class="wrapper">-->
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-money"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  5.150$
                              </h1>
                              <p>COTIZACIÓN DEL DIA</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <!--<h1 class=" count2">
                                  0
                              </h1>-->
                              <h1>
                                  5.8978
                              </h1>
                              <p>TOTAL DE PEDIDOS REALIZADOS</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                             <h1>78979</h1>
                              <p>NUEVAS ORDENES</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-thumbs-up"></i>
                          </div>
                          <div class="value">
                            <h1>78979</h1>
                              <p>ORDENES ENTREGADAS</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->
              <!--panel principal-->

<!--***************************************************************************SOCKET***************************************************************-->
<script src="https://js.pusher.com/2.2/pusher.min.js"></script>
<script>
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
        push_pedido(data);
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
<!--***************************************************************************SOCKET*****************************************************************-->
<script type="text/javascript">
function dd(){
    $(".pedido_llegados").draggable({containment:'document', revert:true,
        start:function(){
            contents = this;
        }
        });
    $( ".select_ordenes" ).droppable({ accept:'.pedido_llegados',
        drop: function(){
            $( this ).append(contents.innerHTML);
            contents.remove();
            $( this ).children().last().addClass('minimizado');
            $( this ).children().last().click(function(){
                console.log($(this));
                rollback($(this));
            });
        }});
    $('.btn-delete').on('click', function(){
        $(this).closest('.pedido_llegados').remove();
    });
    $('.eliminar').on('click', function(){
        var ordenes = $(this).closest('.seleccion_ordenes');
        ordenes.children('.select_ordenes').children().each(function(index){
            rollback( $(this) );
        });
        ordenes.remove();
        
    });

};
 
function print( title, w, h) {
  var left = (screen.width/2)-(w/2);
  var top = (screen.height/2)-(h/2);
  return window.open("print.html", title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 


    function rollback(element){
        console.log(element);
        newDIV = document.createElement("div");
        newDIV.innerHTML = "<div>" +  element.html() + "</div>";
        newDIV.className = 'pedido_llegados';
        element.remove();
        document.getElementById('cuadro_pedido').insertBefore(newDIV, document.getElementById('cuadro_pedido').firstChild);
        dd();
    }


    function crear_pedido(){
        var html = '';
        html += '<div class="pedido_llegados">';
        html += '<div>';
        html += '<div class="titulo_orden">N° de Pedido ' + Math.floor(Math.random()*89999+10000) + ' <i id="down" class="fa fa-toggle-down (alias)"></i> </div><!--titulo_orden-->';
        html += '<div class="info_box">';
        html += '<p><i class="bol">Nombre: </i>Marcos Martinez</p> ';
        html += '<p><i class="bol">Telefono: </i>0978655845</p>';
        html += '<p><i class="bol">Dirección: </i>Barrio San jose al costado de colegio camino de empedrado a tres cuadras de </p>';
        html += '<div class="room-box">';
        html += '<h5 class="text-primary"><strong>Pedido:  Pizza</strong></h5>';
        html += '<p><span class="text-muted">cantidad :</span> 1 </p>';
        html += '<p><span class="text-muted">Tamanho :</span> Grande </p>';
        html += '<p><span class="text-muted">Masa :</span> fina  </p>';
        html += '<p><span class="text-muted">Sabor :</span> 4 quersos, peperoni</p>';
        html += '<p><span class="text-muted">Destalle :</span>favor si puede sacar el tomate y sim pimienta</p>';
        html += '<p><h5><i class="text-primary"><strong>Monto:</strong> </i>180.000 Gs.</h5></p>     ';           
        html += '</div>';
        html += '<div id="cuadro2">';
        html += '<button id="eliminar_box" type="button"class="btn btn-danger btn-delete">';
        html += '<i class="glyphicon glyphicon-trash"></i>';
        html += '<span>Eliminar</span>';
        html += '</button>';
        html += '</div>';
        html += '</div><!--info_box-->';
        html += '</div>';
        html += '</div>';
        $('#cuadro_pedido').append(html);
        dd();
    }

function push_pedido(data){
    var html = '';
    html += '<div class="pedido_llegados">';
    html += '<div>';
    html += '<div class="titulo_orden">N° de Pedido ' + Math.floor(Math.random()*89999+10000) + ' <i id="down" class="fa fa-toggle-down (alias)"></i> </div><!--titulo_orden-->';
    html += '<div class="info_box">';
    html += '<p><i class="bol">Nombre: </i>' + data.nombre_usuario + '</p>';
    html += '<p><i class="bol">Telefono: </i>' + data.celular + '</p>';
    html += '<p><i class="bol">Dirección: </i>' + data.direccion + '</p>';
    html += '<div class="room-box">';
    for(var i=0; i < data.pedido.length; i++) {
        html += '<h5 class="text-primary">Pruducto:  ' + data.pedido[i].producto + '</h5>';
        html += '<h5 class="text-primary">Descripcion:  ' + data.pedido[i].descripcion + '</h5>';
        html += '<p><span class="text-muted">Cantidad :</span> ' + data.pedido[i].cantidad + ' </p>';
        html += '<p><h5><i class="text-primary"><strong>Precio:</strong> </i>' + data.pedido[i].precio + '</h5></p>     ';
        html += '<p><h5><i class="text-primary"><strong>Subtotal:</strong> </i>' + data.pedido[i].subtotal + '</h5></p>     ';
        if(typeof data.pedido[i].extras !== 'null'){
            html += '<h5 class="text-primary">Extras del producto:</h5>';
            for(var k=0; k < data.pedido[i].extras; k++){
                html += '<p><span class="text-muted">Nombre :</span> ' + data.pedido[i].extras[k].nombre + ' </p>';
                html += '<p><span class="text-muted">Precio :</span> ' + data.pedido[i].extras[k].precio + ' </p>';
            }
        }
    }
    html += '</div>';
    html += '<div id="cuadro2">';
    html += '<button id="eliminar_box" type="button"class="btn btn-danger btn-delete">';
    html += '<i class="glyphicon glyphicon-trash"></i>';
    html += '<span>Eliminar</span>';
    html += '</button>';
    html += '</div>';
    html += '</div><!--info_box-->';
    html += '</div>';
    html += '</div>';
    $('#cuadro_pedido').append(html);
    dd();
}


      function crear_orden(){
        var html = '';
       
        html+='<div class="seleccion_ordenes">';
        html += '<div class="orden_cocina">';
        html += '<p id="text_orden"> Entrada de Cocina N° '+ Math.floor(Math.random()*899+100) +'</p><!--text_orden-->';
        html += '</div><!--orden_cocina-->';
        html += ' <div class="select_ordenes">';
        html += ' </div><!--select_ordenes-->';
        html += '<button  type="button"class="eliminar btn btn-danger btn-delete" >';
        html += '<i class="glyphicon glyphicon-trash"></i>';
        html += '<span>Eliminar</span>';
        html += '</button>';
        html +='&nbsp;';
        html += '<button  onclick="print()"   ontitle="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-warning">';
        html += '<i class="fa fa-print"></i>';
        html += '<span>Imprimir</span>';
        html += '</button>';
        html += '<div id="espacio"></div>';
        html += '</div>';
        $('#panel-body').append(html);
        dd();

    }
$(document).ready(function(){
    dd();
});


    
</script>


  <div id='bok'class="col-md-8"><!--blog de pedido-->
  <section class="panel">
   <div class="panel-body progress-panel">
    
    <div class="task-progress">
        <h1><strong>Pedidos </strong></h1> 
    </div><!--task-progress-->
    <button onclick="crear_orden()" class="new">Nueva Orden <strong class='fa fa-sign-in'>  </strong> </button>

       <hr>

           <div id='cuadro_pedido' class="cuadro_pedido">
               @foreach($pedidos as $pedido)
           <div class="pedido_llegados">
               <div>
                   <div class="titulo_orden">Pedido N° {{ $pedido->codigo }}<i id='down' class="fa fa-toggle-down (alias)"></i> </div><!--titulo_orden-->
                   <div class="info_box">
                    <p><i class="bol">Nombre: </i>{{$pedido->nombres}}</p>
                    <p><i class="bol">Telefono: </i>{{ $pedido->celular }}</p>
                    <p><i class="bol">Dirección: </i>{{ $pedido->direccion }} </p>
                    <p><i class="bol">Inporte total: </i><b>{{ \App\Moneda::guaranies($pedido->importe_total) }}</b> </p>
                    <div class="room-box">
                        <h5 class="text-primary"><strong>Detalle del pedido</strong></h5>
                        @foreach($pedido->detallado as $detalle)
                            <h5 class="text-primary">Pruducto:  {{ $detalle->producto->denominacion }}</h5>
                            <p><span class="text-muted">Descripcion :</span> {{ $detalle->producto_descripcion }} </p>
                            <p><span class="text-muted">Cantidad :</span> {{ \App\Moneda::guaranies($detalle->cantidad, true) }} </p>
                            <p><span class="text-muted">Precio :</span>{{ \App\Moneda::guaranies($detalle->precio) }}</p>
                            <p><span class="text-muted">Subtotal :</span>{{ \App\Moneda::guaranies($detalle->subtotal) }}</p>
                            @if(count($detalle->listaextras) > 0)
                                <h5 class="text-primary">Extras del producto:</h5>
                            @endif
                            @foreach($detalle->listaextras as $extra)
                                <p><span class="text-muted">Nombre :</span> {{ $extra->producto->nombres }} </p>
                                <p><span class="text-muted">Precio :</span>{{ \App\Moneda::guaranies($extra->extra_precio) }}</p>
                            @endforeach
                            <br>
                        @endforeach
                    </div>
                    <button type="button" id="boton_eliminar"  class="btn btn-danger btn-delete">
                      <i class="glyphicon glyphicon-trash"></i>
                       <span>Eliminar</span>
                    </button>
                   </div><!--info_box-->

               </div>

           </div>
      @endforeach


  </section><!--panel-->

  </div><!--blog de pedido fin-->

<!--****************************************************************-->

    <div class="col-md-4"><!--blog de pedido-->
  <section class="panel">
   <div id='panel-body' class="panel-body progress-panel">
    <div class="task-progress">
        <h1><strong>Ordenes </strong>  </h1> 
    </div><!--task-progress-->

       <hr>
       <div id='seleccion_ordenes' class="seleccion_ordenes">
          <div class="orden_cocina">
             <p id="text_orden"> Entrada de Cocina N° 1</p><!--text_orden-->
          </div><!--orden_cocina-->
          <div class="select_ordenes">
              
          </div><!--select_ordenes-->
             <button type="button" class="eliminar btn btn-danger delete">
              <i class="glyphicon glyphicon-trash"></i>
               <span>Eliminar</span>
            </button>
            <button onclick="print()" title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-warning"><i class="fa fa-print"></i> Imprimir</button>
       </div><!--seleccion_ordenes-->

   </div> <!--panel-body progress-panel-->   
  </section><!--panel-->
  </div><!--blog de pedido fin-->

 

 
 <script type="text/javascript">
 function ChangeItem(icon){
   
        if(icon.className.indexOf('green') > 0){
            icon.className = icon.className.replace('green', 'red');
        } else {
            icon.className = icon.className.replace('red', 'green');
        }
 }
 </script>
 <!--paginacion-->

 <!--paginacion fin-->
              <!--panel principal final-->
                      <!--weather statement start-->

                      </section>

                      <!--weather statement end-->

                  </div>
              </div>

          </section>
      </section>
@stop