@extends("admin.index")
@section("contenido")
     <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
            
              <!--state overview end-->
              <!--panel principal-->


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
        html += '<button id="eliminar_box" type="button"class="btn btn-danger btn-delete">';
        html += '<i class="glyphicon glyphicon-trash"></i>';
        html += '<span>Eliminar</span>';
        html += '</button>';
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


  <div id='bok'class="col-lg-12"><!--blog de pedido-->
  <section class="panel">
   <div class="panel-body progress-panel">
    
    <div class="task-progress">
        <h1><strong>Producto / Cadastro</strong></h1> 
    </div><!--task-progress-->
       <hr>
       <div class="cat_select">
       <div class="cat_select_marco">
            <div id="categorias_boton">
            <div class="iconos">
            <a href="{{URL::to('control/cadastro/pizza')}}">
            <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/pizza.png')}}">
            </div>
              <p>Pizza</p>
            </div>
            </a>
            </div>

            <div id="categorias_boton">
            <div class="iconos">
             <a href="{{URL::to('control/cadastro/lomito')}}">
            <div class="icon_cuadro">
               <img src="{{URL::to('admin/icon/lomito.png')}}">
            </div>
              <p>Lomito</p>
            </div>
            </div>

            <div id="categorias_boton">
            <div class="iconos">
                <a href="{{URL::to('control/cadastro/hamburguesas')}}">
             <div class="icon_cuadro">
               <img src="{{URL::to('admin/icon/hamburguesa.png')}}">
            </div>
            
              <p>Hamburguesa</p>
            </div>
            </div>
             <div id="categorias_boton">
            <div class="iconos">
                <a href="{{URL::to('control/cadastro/bebidas')}}">
            <div class="icon_cuadro">
               <img src="{{URL::to('admin/icon/babidas.png')}}">
            </div>
           
              <p>Bebida</p>
            </div>
            </div>
             <div id="categorias_boton">
            <div class="iconos">
                 <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/helado.png')}}">
            </div>
            
              <p>Postres</p>
            </div>
            </div>


            <div id="categorias_boton">
            <div class="iconos">
            <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/oriental.png')}}">
            </div>
            
              <p>Oriental</p>
            </div>
            </div>

           <div id="categorias_boton">
               <div class="iconos">
                   <div class="icon_cuadro">
                       <img src="{{URL::to('admin/icon/vegana.png')}}">
                   </div>

                   <p>Vegana</p>
               </div>
           </div>



            <div id="categorias_boton">
            <div class="iconos">
            <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/vegana.png')}}">
            </div>
            
              <p>Combos</p>
            </div>
            </div>

           
       </div><!--cat_select_marco-->
       </div><!--cat_select-->
     

                              



       


   </div> <!--panel-body progress-panel-->   
  </section><!--panel-->

  </div><!--blog de pedido fin-->

<!--****************************************************************-->


 

 
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



      <!--main content end-->
@stop