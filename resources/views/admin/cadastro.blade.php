@extends("admin.index")
@section("contenido")
     <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
            
              <!--state overview end-->
              <!--panel principal-->




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
                <a href="{{URL::to('control/cadastro/helado')}}">
                 <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/helado.png')}}">
            </div>
            
              <p>Helados</p>
            </div>
            </div>


            <div id="categorias_boton">
            <div class="iconos">
                <a href="{{URL::to('control/cadastro/oriental')}}">
            <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/oriental.png')}}">
            </div>
            
              <p>Oriental</p>
            </div>
            </div>

           <div id="categorias_boton">
               <div class="iconos">
                   <a href="{{URL::to('control/cadastro/vegana')}}">
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