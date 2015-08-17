@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.pizzamenu')
                          <!--manu fin-->
                          <div class="col-lg-3"><!--contenido Pizza-->

                              <div class="cuadro_gris">



                                      <div class="form_box">



                                              <h3 class="titulo_sabor" >Nuevas Especialidad</h3>
                                          {!! Form::select('cod', $selectEspecie, null, ['id' => 'codespecie', 'class' => 'form-control']) !!}

                                          <h3 class="titulo_sabor" >Tamanho</h3>
                                          {!! Form::select('codtamanho', $selectTamanho, null, ['id' => 'codetamanho', 'class' => 'form-control']) !!}


                                          <h3 class="titulo_sabor" >Masa</h3>

                                          {!! Form::select('codtamanho', $selectMasa, null, ['id' => 'codetamanho', 'class' => 'form-control']) !!}

                                          <h3 class="titulo_sabor" >Precio</h3>
                                          <input type="text" class="form-control">
                                          <br>



                                          <!--****************************-->

                                                <div class="btngrande">

                                              <button type="submit" class=" btn btn-danger">Guardar</button>
                                                </div>


                                      </div><!--form_box-->

                              </div><!--cuadro_gris-->





                          </div><!--contenido Pizza fin-->


                          </div><!--tamanho grande fin-->





                          <!--********************fin contenido de Paginas********************-->



@stop