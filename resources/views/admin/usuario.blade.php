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
        <h1><strong>Usuarios </strong></h1> 
    </div><!--task-progress-->
       <hr>
     

                              

                                          <div class="ajuste_user">

                                              <form role="form">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Nombre</label>
                                                      <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                                                  </div>
                                                   <div class="form-group">
                                                      <label for="exampleInputEmail1">Usuario</label>
                                                      <input type="text" class="form-control" id="usuario" placeholder="usuario">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Password</label>
                                                      <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                                  </div>
                                                  



                                     
                                      <div class="radios">
                                              <label class="label_radio r_off" for="radio-01">
                                                  <input name="sample-radio" id="radio-01" value="1" type="radio" checked=""> Administrador
                                              </label>
                                              <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                                              <label class="label_radio r_off" for="radio-02">
                                                  <input name="sample-radio" id="radio-01" value="1" type="radio"> Operador
                                              </label>
                                              
                                          </div>
                                         <button type="submit" class="btn btn-danger">Guardar</button>
                                              </form>

                                          </div>
<hr>
                                      </div>
              <!-- page start-->
              <!-- page end-->
              <div class="espacio">
                <section class="panel">
                  <header class="panel-heading">
                     
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="btn-group">
                                  
                              </div>
                              <div class="btn-group pull-right">
                             
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="#">Print</a></li>
                                      <li><a href="#">Save as PDF</a></li>
                                      <li><a href="#">Export to Excel</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Usuario</th>
                                  <th>Roles</th>
                                  
                                  <th></th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr class="">
                                  <td>Jondi Rose</td>
                                  <td>Alfred Jondi Rose</td>
                                  <td class="center">super user</td>
                                   <td><button type="submit" class="btn btn-warning">Editar</button></td>
                                    <td><button type="submit" class="btn btn-danger">Deletar</button></td>
                              </tr>
                              <tr class="">
                                  <td>Dulal</td>
                                  <td>Jonathan Smith</td>
                                  <td class="center">new user</td>
                                    <td><button type="submit" class="btn btn-warning">Editar</button></td>
                                  <td><button type="submit" class="btn btn-danger">Deletar</button></td>
                              </tr>
                              <tr class="">
                                  <td>Rafiqul</td>
                                  <td>Rafiqul dulal</td>
                                 
                                  <td class="center">new user</td>
                                    <td><button type="submit" class="btn btn-warning">Editar</button></td>
                                  
                                  <td><button type="submit" class="btn btn-danger">Deletar</button></td>
                                  
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </section>
                
              </div><!--espacio-->

       


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
@stop