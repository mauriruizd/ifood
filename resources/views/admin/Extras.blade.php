@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.pizzamenu')
                          <!--manu fin-->
                          <div class=" col-lg-8"><!--contenido Pizza-->

                              <div class="cuadro_gris0">


                                  {!! Form::open(['route'=>'ControlExtras.store','method'=>'POST']) !!}
                                      <div class="form_box1">


                                              <h3 class="titulo_sabor" >Tipo de Extras</h3>
                                             {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese tipo de masa']) !!}

                                          <br>

                                          {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}
                                      </div><!--form_box-->


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
                                  <th></th>
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