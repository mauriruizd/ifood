@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.pizzamenu')
                          <!--manu fin-->
                          <div class="col-md-8"><!--contenido Pizza-->

                              <div class="cuadro_gris0">

                                  {!! Form::open(['route'=>'PizzaControlProducto.store','method'=>'POST','files' => true]) !!}


                                          <div id="caja3">
                                              <h3 class="titulo_sabor" >Sabor</h3>
                                          {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'']) !!}
                                          </div>
                                          <div id="caja3">
                                              <h3 class="titulo_sabor" >categorias</h3>

                                           {!! Form::select('especialidad', $selectDetalle, null,['id'=>'codedetaller','class'=>'form-control']) !!}

                                          </div>


                                          <div id="caja3">
                                              <h3 class="titulo_sabor" >Detalle</h3>
                                              {!! Form::textarea('descrip', null, ['class' => 'form-control']) !!}


                                          </div>

                                          <!--******************************-->
                                          <div id="caja3">
                                              <div class="">
                                                  <h3 class="titulo_sabor" >Imagen</h3>

                                                  {!! Form::file('image',['id'=>'file-1','class'=>'file']) !!}

                                              </div>
                                          </div>


                                          <!--****************************-->

                                                <div class="btngrande">

                                             {!! Form::submit('Registrar', ['class'=>'btn  btn-danger']) !!}
                                                </div>

                                {!! Form::close() !!}


                              </div><!--cuadro_gris-->





                          </div><!--contenido Pizza fin-->













                          <!--********************fin contenido de Paginas********************-->



@stop