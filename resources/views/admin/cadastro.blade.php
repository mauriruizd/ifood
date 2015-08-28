@extends("admin.index")
@section("contenido")




  <div id='bok'class="col-lg-12"><!--blog de pedido-->
  <section class="panel">
   <div class="panel-body progress-panel">
    


       <div class="cat_select">
       <div class="cat_select_marco">
            <div id="categorias_boton">
            <div class="iconos">
            <a href="{{URL::to('PizzaControlProducto/create')}}">
            <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/pizza.png')}}">
            </div>
              <p>Pizza</p>
            </div>
            </a>
            </div>

            <div id="categorias_boton">
            <div class="iconos">
             <a href="{{URL::to('/ControlProductoLomito/create')}}">
            <div class="icon_cuadro">
               <img src="{{URL::to('admin/icon/lomito.png')}}">
            </div>
              <p>Lomito</p>
            </div>
            </div>

            <div id="categorias_boton">
            <div class="iconos">
                <a href="{{URL::to('/ControlProductoHamburguesa/create')}}">
             <div class="icon_cuadro">
               <img src="{{URL::to('admin/icon/hamburguesa.png')}}">
            </div>
            
              <p>Hamburguesa</p>
            </div>
            </div>
             <div id="categorias_boton">
            <div class="iconos">
                <a href="{{URL::to('/ControlProductoBebida/create')}}">
            <div class="icon_cuadro">
               <img src="{{URL::to('admin/icon/babidas.png')}}">
            </div>
           
              <p>Bebida</p>
            </div>
            </div>
             <div id="categorias_boton">
            <div class="iconos">
                <a href="{{URL::to('/ControlProductoHelado/create')}}">
                 <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/helado.png')}}">
            </div>
            
              <p>Helados</p>
            </div>
            </div>


            <div id="categorias_boton">
            <div class="iconos">
                <a href="{{URL::to('/ControlProductoHelado/create')}}">
            <div class="icon_cuadro">
              <img src="{{URL::to('admin/icon/oriental.png')}}">
            </div>
            
              <p>Oriental</p>
            </div>
            </div>

           <div id="categorias_boton">
               <div class="iconos">
                   <a href="{{URL::to('/ControlProductoVegana/create')}}">
                   <div class="icon_cuadro">
                       <img src="{{URL::to('admin/icon/vegana.png')}}">
                   </div>

                   <p>Vegana</p>
               </div>
           </div>



            <div id="categorias_boton">
            <div class="iconos">
                <a href="{{URL::to('/ControlProductoCombo/create')}}">
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








      <!--main content end-->
@stop