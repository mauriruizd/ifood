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
        <h1><strong>Producto / Cadastro / Hamburguesas</strong></h1> 
    </div><!--task-progress-->
       <hr>
       <script type="text/javascript">
       $(document).ready(function(){
        $('.accordion__content:not(:first)').hide();
        $('.accordion__title:first-child').addClass('active');
        $('.accordion__title').on('click', function() {
$('.accordion__content').hide();
$(this).next().show().prev().addClass('active').siblings().removeClass('active');
});
       });
       </script>

<div class="panel_cadastro">
 <dl class="accordion">
  <dt class="accordion__title">Sabor</dt>
  <dd class="accordion__content">
  <div class="cuadro_gris">
  
 
                              <form class="text_class" role="form">
                                <div class="form_box">
                                <div id="caja">
                                 <h3 class="titulo_sabor" >Sabor Lomito</h3>
                                         <input id="publish_ad_title" maxlength="130" name="ad[title]" type="text">
                                </div>
                                      <div id="caja">
                                      <h3 class="titulo_sabor" >Precios</h3>
                                         <input id="publish_ad_title" maxlength="130" name="ad[title]" type="text">

                                        </div>
                                      
                                      <h3 class="titulo_sabor" >Detalle</h3>
                                      
                                        <textarea rows="4" cols="50"></textarea>
                                        <br>
                                        <br>
                                    
                                          <button type="submit" class="btn btn-danger">Guardar</button>
                                   </div><!--form_box-->

                              </form>
</div><!--cuadro_gris-->
<div class="cuadro_gris0">
  
                 <section class="panel">
                  <header class="panel-heading">
                     
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">

                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Sabor Lomitos</th> 
                                  <th>precios</th>
                                  <th>Detaller</th>   
                                  <th></th>
                                  <th></th> 
                                  <th >Activar</th> 


                              </tr>
                              </thead>
                              <tbody>
                              <tr class="">
                                  <td>Clasica</td>
                                  <td>4 queso</td>
                                  <td>peperoni, tomate, salsa, queso</td>
                                 <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                       <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>
                                       <td align="center">
                                            
                                <section>
                                  <!-- Checbox Four -->
                                    <div class="checkboxFour">
                                      <input type="checkbox" value="0" id="checkboxFourInput" name="" checked />
                                      <label for="checkboxFourInput"></label>
                                    </div>
                                </section>
                                </td>
                                            
                              </tr>
                            
                              <tr class="">
                                  <td>de la casa</td>
                                  <td>clasicas</td>
                                  <td>clasicas</td>
                                   <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td> 
                                         <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>
                                       <td align="center">
                                            
                                        <section>
                                          <!-- Checbox Four -->
                                            <div class="checkboxFour">
                                              <input type="checkbox" value="1" id="1" name="" checked />
                                              <label for="1"></label>
                                            </div>
                                        </section>
                                        </td>
                              </tbody>
                          </table>
                                  <ul class="pagination pagination-sm pull-right">
                                      <li><a href="#">«</a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                     
                                      <li><a href="#">»</a></li>
                                  </ul>
                             

                      </div>
                  </div>

              </section>
</div><!--cuadro_gris-->


</dd>

<!--**********************************-->
  <dt class="accordion__title">Extras</dt>
  <dd class="accordion__content">
  <div class="cuadro_gris">
  
 
                              <form class="text_class" role="form">
                                <div class="form_box">
                                <div id="caja">
                                 <h3 class="titulo_sabor" >Extras</h3>
                                         <input id="publish_ad_title" maxlength="130" name="ad[title]" type="text">
                                </div>
                                      <div id="caja">
                                      <h3 class="titulo_sabor" >Precios</h3>
                                         <input id="publish_ad_title" maxlength="130" name="ad[title]" type="text">

                                        </div>
                                      
                                      <h3 class="titulo_sabor" >Detalle</h3>
                                      
                                        <textarea rows="4" cols="50"></textarea>
                                        <br>
                                        <br>
                                    
                                          <button type="submit" class="btn btn-danger">Guardar</button>
                                   </div><!--form_box-->

                              </form>
</div><!--cuadro_gris-->
<div class="cuadro_gris0">
  
                 <section class="panel">
                  <header class="panel-heading">
                     
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">

                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>Titulo Extras</th> 
                                  <th>Precio</th>
                                  <th>Detaller</th>   
                                  <th></th>
                                  <th></th> 
                                  <th >Activar</th> 


                              </tr>
                              </thead>
                              <tbody>
                              <tr class="">
                                  <td>Clasica</td>
                                  <td>4 queso</td>
                                  <td>peperoni, tomate, salsa, queso</td>
                                 <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                       <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>
                                       <td align="center">
                                            
                                <section>
                                  <!-- Checbox Four -->
                                    <div class="checkboxFour">
                                      <input type="checkbox" value="0" id="checkboxFourInput" name="" checked />
                                      <label for="checkboxFourInput"></label>
                                    </div>
                                </section>
                                </td>
                                            
                              </tr>
                            
                              <tr class="">
                                  <td>de la casa</td>
                                  <td>clasicas</td>
                                  <td>clasicas</td>
                                   <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td> 
                                         <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>
                                       <td align="center">
                                            
                                        <section>
                                          <!-- Checbox Four -->
                                            <div class="checkboxFour">
                                              <input type="checkbox" value="1" id="1" name="" checked />
                                              <label for="1"></label>
                                            </div>
                                        </section>
                                        </td>
                              </tbody>
                          </table>
                                  <ul class="pagination pagination-sm pull-right">
                                      <li><a href="#">«</a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                     
                                      <li><a href="#">»</a></li>
                                  </ul>
                             

                      </div>
                  </div>

              </section>
</div><!--cuadro_gris-->



</dd>
<!--**********************************-->


    
                             
 
</dl>

  
</div><!--panel_cadastro-->
</div>
     

                              



       


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