@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.lomitomenu')
                          <!--manu fin-->
                          <div class=" col-lg-8"><!--contenido Pizza-->

                              <div class="cuadro_gris0">



                                  {!! Form::open() !!}

                                      <div id="caja3">
                                          <h3 class="titulo_sabor">Nombre</h3>
                                          {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'']) !!}

                                      </div>
                                      <div id="caja3">
                                          <h3 class="titulo_sabor" >Especialidad</h3>

                                          {!! Form::select('especialidad', $lomito, null,['id'=>'codedetaller','class'=>'form-control']) !!}

                                      </div>
                                          <div id="caja3">
                                              <h3 class="titulo_sabor" >Detalle</h3>
                                              {!! Form::textarea('descrip', null, ['class' => 'texto form-control ','size' => '30x5']) !!}


                                          </div>
                                  <div id="caja3">
                                      <div class="">
                                          <h3 class="titulo_sabor" >Imagen</h3>

                                          {!! Form::file('image',['id'=>'file-1','class'=>'file']) !!}

                                      </div>
                                  </div>
                                  <div id="caja3">
                                      <h3 class="titulo_sabor1">Precio</h3>
                                      {!! Form::text('cant_porcion',null,['class'=>'form-control','placeholder'=>'']) !!}

                                  </div>




                                  <div id="caja3">
                                      {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}

                                  </div>




                                  {!! Form::close() !!}

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
                                  <th align="center">Tamanho</th>
                                  <th align="center">Porciones</th>
                                  <th align="center">Sabores</th>

                                  <th></th>
                                  <th></th>
                                  <th align="center">Activar</th>

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


                                      </div><!--form_box-->

                              </div><!--cuadro_gris-->





                          </div><!--contenido Pizza fin-->








                          <!--********************fin contenido de Paginas********************-->



@stop