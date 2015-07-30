@extends("admin.index")
@section("contenido")
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
            
              <!--state overview end-->
              <!--panel principal-->

<style type="text/css">



</style>



  <div id='bok'class="col-lg-12"><!--blog de pedido-->
  <section class="panel">
   <div class="panel-body progress-panel">
    
    <div class="task-progress">
        <h1><strong>Producto / Promociones</strong></h1> 
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

       <style type="text/css">

   /*calendario*/

       </style>
  

  <div class="panel_gral">

<div id="margen_de_cuadro">
 <div class="cuadro_gris_form">
  <div class="text_class" role="form">                             
  <div  class="container_for" ng-controller="ControladorFiltros">
    <div class="">
    <br>
      <div class="panel-heading1">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
          <input type="text" class="form-control" placeholder="Buscare Promoción" >
         <div class="btn-group">
             <button onclick="crear_promocion()" class="btn mini red1">
              <i class="fa  fa-sign-in"></i>
              </button>                
         </div>
        </div>

      </div>

      <div class="panel-body" id="tabla_productos">
      <div class="box_scroll">
        <table class="table table-hover">
          <thead >
          <tr>
            <th>
              <a href="" ng-click="ordenarPor('nombre')">
               
              </a>
              <span class="caret" style="cursor: pointer" ></span>
            </th>
            <th>Nombre</th>
            <th>Precio</th>
           
          </tr>
          </thead>
 <script type="text/javascript">
 $(document).ready(function(){
    updateClicks();
    $('.pasar').on('click',function() { 
      // $('.pasable').appendTo('#destino'); 
      /*$('.pasable').each(function(){
         $('#destino').append('<tr>'+$(this).html()+'</tr>');
  
       });*/
       $('#tabla_productos input:checked').each(function(){
        $('#destino').append('<tr class="eliminar">' + $(this).closest('tr').html() + '</tr>');
        $('#tabla_productos input:checked').attr('checked', false);
       }); 
   $('.pasable').removeClass('pasable este');

});
$('#btn-eliminar').on('click', function(){
    $('.eliminar').each(function(){
      if($(this).children().first().children('input:checked').length){
          $(this).remove();
        }
    });
  });
});
 function updateClicks(){
  $('.este').on('click', function(){
      if($(this).hasClass('pasable')){
        //$(this).css("background","silver");
        $(this).removeClass('pasable');
        return;
      }
     $(this).addClass('pasable');
    
    });
 }

 </script>

<input type="button" class="pasar izq" value="Pasar »">
          <tbody>
          <tr class="este" id="est">
            <td ><input id="check" type="checkbox"></td>
            <td >lomito de verdaras</td>
            <td>15000gs</td>
           
          </tr>
            <tr class="este" id="est1">
               <td ><input type="checkbox"></td>
            <td >coca 1.5L</td>
            <td>15000gs</td>
           
          </tr>
       
       
          </tbody>


   
        </table>
         </div><!--box_scroll-->


      </div>

    </div>
  </div>
 </div> <!--text_class-->
</div><!--cuadro_gris-->
  

<!--*******************************************-->





<!--*******************************************-->

 <div class="cuadro_gris_form">
  <div class="" role="form">                             
  <div  class="container_for">
    <div class="">
    <br>


      <div class="panel-body">
      <div class="box_scroll">
        <table class="table table-hover">
          <thead>
          <tr>
            <th>

              <span class="caret" ></span>
            </th>
            <th>Titulo </th>
            <th>Precio</th>
            <th>fecha inicio</th>
            <th>fecha fin</th>
            <th>Foto</th>
            <th>Activar</th>
           
          </tr>
          </thead>
 
  


<input type="button" class="pasar izq" value="Modificar »">
          <tbody>
          <tr class="este" id="est">
            <td ><input id="check" type="checkbox"></td>
            <td >Lomito de verdaraslomito de verdaras <strong>+</strong> coca 1.5L</td>
            <td>20000gs</td>   
            <td>16/12/2015</td>
            <td>16/12/2015</td>
            <td class="img_promo"><img src="{{URL::to('admin/imagen/promo1.jpg')}}"></td>
            <td align="center">             
                                <section>
                                  <!-- Checbox Four -->
                                    <div class="checkboxFour">
                                      <input type="checkbox" value="0" id="checkboxFourInput" name=""  checked/>
                                      <label for="checkboxFourInput"></label>
                                    </div>
                                </section>
            </td>
           
          </tr>
          <!--*********************-->

            <tr class="este" id="est1">
               <td ><input type="checkbox"></td>
            <td >coca 1.5L</td>
            <td>5000gs</td>
            <td>16/12/2015</td>
            <td>16/12/2015</td>
           <td class="img_promo"><img src="{{URL::to('admin/imagen/promo.jpeg')}}"></td>
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
       
       
          </tbody>

          

        </table>


         </div><!--box_scroll-->


      </div>

    </div>
  </div>
 </div> <!--text_class-->
</div><!--cuadro_gris-->

 
<!--*******************************************-->
</div><!--margen de cuadro-->

<!--******************************************-->



<div id="seleccionados">

 <div class="cuadro_gris_promo">
 <script type="text/javascript">
  
  $(function(){


  $("#fecha_final").prop('disabled', true);



    $("#fecha").datepicker({
       dateFormat: 'dd-mm-yy',
       inline: true,
            showOtherMonths: true,
             monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Jan', 'Feb', 'M&auml;r', 'Apr', 'Mai', 'Jun',
            'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            numberOfMonths: 1,

           onSelect: function(selected) {

           $("#fecha_final").datepicker("option","minDate", selected)
            $("#fecha_final").prop('disabled', false);

        }
    });



    $("#fecha_final").datepicker({
      dateFormat: 'dd-mm-yy',
   inline: true,
            showOtherMonths: true,
             monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Jan', 'Feb', 'M&auml;r', 'Apr', 'Mai', 'Jun',
            'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
            dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            numberOfMonths: 1,
           onSelect: function(selected) {
           $("#fecha").datepicker("option","maxDate", selected)
        }

    });
  });

</script>

<script type="text/javascript">
function crear_promocion(){

var html='';

html+='<div class="lista_promo">';
html+='<div class="caja_lista1">';
html+='<div class="titulo_depromo">';
html+='<input id="fecha_final" type="text" class="form-control"  placeholder="__/__/____" >';
html+='<input id="fecha" type="text" class="form-control" placeholder="__/__/____" >';
html+='<input id="titulo_promo" type="text" class="form-control" placeholder="titulo" >';
html+='</div>';
html+='</div><!--caja_lista1-->';
html+='<div class="caja_lista"><br>';
html+='<div class="caja_lista_promo">';
html+='<table id="destino" class="table table-hover"></table>';
html+='</div><br>';
html+='<input type="button" id="btn-eliminar" value="Eliminar »">';
html+='<div class=""><br>';
html+='<label>Precio Promoción</label>';
html+='<input  type="text"  class="form-control">';
html+='</div> <br>';
html+='<label>Descripción Promoción</label>';
html+='<textarea  class="form-control" rows="4" cols="50"></textarea><br>';
html+='<input type="file" ><br>';
html+='<button type="submit" class="btn btn-warning">Guardar</button>';
html+=' <button  class="eliminar_promo btn btn-danger">Eliminar</button>'
html+='</div>';
html+='</div>';
html+='</div>';
$('.cuadro_gris_promo').append(html);
eliminarclick();
} 

</script>

<script type="text/javascript">

  $(document).ready(function(){
eliminarclick();
  });
  function eliminarclick(){
    $('.eliminar_promo').on('click', function(){
    $(this).closest('.lista_promo').remove();
    console.log($(this).closest('.lista_promo'));
    

    });
  }
</script>

<!--***************************-->
 <div class="lista_promo">

<div class="caja_lista1">
   <div class="titulo_depromo">
      <input id='fecha_final' type="text" class="form-control"  placeholder="__/__/____" >
      <input id='fecha' type="text" class="form-control" placeholder="__/__/____" data-mask="99/99/9999" >
       <input id='titulo_promo' type="text" class="form-control" placeholder="titulo" >     
   </div>
  
   </div><!--caja_lista1-->
   <div class="caja_lista"><br>
  <div class="caja_lista_promo">
   <!--<select name="destino[]" id="destino" multiple="multiple" size="8">
    
   </select>-->

     <table id="destino" class="table table-hover"></table>
  </div>
<br>
 <input type="button" id="btn-eliminar" value="Eliminar »">

<div class=""><br>
  <label>Precio Promoción</label>
     <input  type="text"  class="form-control">
</div>
     

     <br>
     <label>Descripción Promoción</label>
     <textarea  class="form-control" rows='4' cols='50'></textarea><br>
     <input type="file" ><br>

     <button type="submit"  class="btn btn-warning">Guardar</button>
      <button type="" class="eliminar_promo btn btn-danger">Eliminar</button>

   </div><!--caja_lista-->


</div><!--lista_promo-->
<!--***************************-->



                         
</div><!--cuadro_gris-->
  
</div><!--seleccionados-->
  



<!--******************************************-->

</div><!--panel_gral-->

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