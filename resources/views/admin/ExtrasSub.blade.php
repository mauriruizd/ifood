@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@if(!isset($routes))
    @include('usuario.pizzamenu')
@else
    @include('usuario.'.$routes)
@endif
                          <!--manu fin-->
<div class=" col-lg-8"><!--contenido Pizza-->

     <div class="cuadro_gris0">
                                     <script type="text/javascript">
                                         $(document).ready(function() {
                                             $('#example-allSelectedText-includeSelectAllOption').multiselect({
                                                 includeSelectAllOption: true,
                                                 allSelectedText: 'Todas las opciones...'
                                             });
                                         });
                                     </script>

                                  {!! Form::open(['route'=>$formRoute.'.store','method'=>'POST']) !!}


                                          <div id="caja003">
                                              <h3 class="titulo_sabor" >Especialidad</h3>

                                              {!! Form::select('especialidad', $selectLomito, null,['id'=>'codedetaller','class'=>'form-control']) !!}

                                          </div>
                                         <div id="caja03">
                                             <h3 class="titulo_sabor" >Tipo de Extras</h3>
                                             {!! Form::select('especialidad', $subcategoriasSelect, null,['id'=>'example-allSelectedText-includeSelectAllOption','class'=>'form-control  ','multiple'=>"multiple"]) !!}
                                         </div>
                                         <div id="caja003">
                                             <h3 class="titulo_sabor" >Precio</h3>
                                             {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'']) !!}

                                         </div>




<br>



         <div id="caja2">

                                  {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}

</div>
                                  {!! Form::close() !!}
                                                 <!--listado de especialidad-->


<div class="cuadro_de_cat">
                <section class="panel">
                  <header class="panel-heading">

                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">

                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>

                              <tr>
                                  <th>Categorias</th>  
                                  <th>Nombre</th>
                                  <th></th>


                              </tr>
                              </thead>
                              <tbody class="">


                              </tbody>

                          </table>


                      </div>

                  </div>

              </section>
                
</div><!--cuadro_de_cat-->
                                                 <!--listado de especialidad fin -->


 </div><!--cuadro_gris-->

 </div><!--contenido Pizza fin-->








                          <!--********************fin contenido de Paginas********************-->



@stop