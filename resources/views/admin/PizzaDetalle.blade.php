@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.pizzamenu')
                          <!--manu fin-->
                          <div class="col-md-8"><!--contenido Pizza-->

                              <div class="cuadro_gris0">

                                      <div class="form_box">

                                {!! Form::open(['route'=>'PizzaControlDetalle.store','method'=>'POST']) !!}

                                          <div id="caja2">
                                              <h3 class="titulo_sabor" >Nuevas Especialidad</h3>
                                              {!! Form::select('especialidad', $selectEspecie, null, ['id' => 'codespecie', 'class' => 'form-control']) !!}

                                          </div>
                                          <div id="caja2">
                                              <h3 class="titulo_sabor" >Tamanho</h3>
                                              {!! Form::select('tamanho', $selectTamanho, null, ['id' => 'codetamanho', 'class' => 'form-control']) !!}


                                          </div>
                                          <div id="caja2">
                                              <h3 class="titulo_sabor" >Masa</h3>
                                              {!! Form::select('masa', $selectMasa, null, ['id' => 'codemasa', 'class' => 'form-control']) !!}

                                          </div>
                                          <div id="caja2">

                                              <h3 class="titulo_sabor" >Precio</h3>
                                              {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'']) !!}
                                          </div>






                                          <br>



                                          <!--****************************-->

                                                <div class="btngrande">

                                                    {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}
                                                </div>
                                          {!! Form::close() !!}


                                      </div><!--form_box-->

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
                                                          <th align="center">Especialidad</th>
                                                          <th align="center">Tamanho</th>
                                                          <th align="center">Masa</th>
                                                          <th align="center">Precio</th>


                                                          <th></th>
                                                          <th></th>
                                                          <th align="center">Activar</th>

                                                      </tr>
                                                      </thead>
                                                      <tbody class="">

                                                      @foreach($detaPizza as $tamanhos)
                                                          <td align="center">{{$tamanhos->especialidad_nombre}}</td>
                                                          <td align="center">{{$tamanhos->tamanho_nombre}}</td>
                                                          <td align="center">{{$tamanhos->masa_nombre}}</td>
                                                          <td align="center">{{\App\Moneda::guaranies($tamanhos->precio)}}</td>

                                                          <td align="center"> {!! link_to_route('PizzaControlDetalle.edit', $title = 'Editar', $parameters = $tamanhos->codigo, $attributes = ['class'=>'fa fa-pencil btn btn-warning btn-xs']); !!}</td>
                                                          <td align="center">
                                                              {!! Form::open(['route'=>['PizzaControlDetalle.destroy',$tamanhos->codigo], 'method'=>'DELETE']) !!}
                                                              {!! Form::submit('Eliminar ',['class'=>'fa fa-trash-o btn btn-danger btn-xs']) !!}
                                                              {!!Form::close()!!}
                                                          </td>


                                                          <td align="center"> <a href="{{URL::to('PizzaControlDetalle/create/estadodetalle/'.$tamanhos->codigo)}}"><button class="btn {{$tamanhos->estado?' btn-danger':' btn-warning'}} btn-xs"><i class="fa {{$tamanhos->estado?'fa-check':'fa-times'}} "></i></button></a></td>



                                                          </tr>
                                                      @endforeach
                                                      </tbody>

                                                  </table>


                                              </div>

                                          </div>

                                      </section>

                                  </div><!--cuadro_de_cat-->



                              </div><!--cuadro_gris-->



                          </div><!--contenido Pizza fin-->



                          </div><!--tamanho grande fin-->





                          <!--********************fin contenido de Paginas********************-->



@stop