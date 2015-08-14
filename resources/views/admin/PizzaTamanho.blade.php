@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.pizzamenu')
                          <!--manu fin-->
                          <div class=" col-lg-8"><!--contenido Pizza-->

                              <div class="cuadro_gris0">



                                  {!! Form::open(['route'=>'PizzaControlTamanho.store', 'method'=>'POST']) !!}


                                  <div class="form_box1">




                                      <?php
                                      // Form::select('cod', $selectEspecie, null, ['id' => 'codespecie', 'class' => 'form-control'])
                                      //Form::text('precio',null,['class'=>'form-control','placeholder'=>''])
                                      ?>
                                      <div id="caja1">
                                          <h3 class="titulo_sabor">Tamanho</h3>
                                          {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'']) !!}

                                      </div>

                                      <div id="caja1">
                                          <h3 class="titulo_sabor1">Porciones</h3>
                                          {!! Form::text('cant_porcion',null,['class'=>'form-control','placeholder'=>'']) !!}
                                      </div>

                                      <div id="caja1">
                                          <h3 class="titulo_sabor1">Sabores</h3>
                                          {!! Form::text('cant_sabores',null,['class'=>'form-control','placeholder'=>'']) !!}
                                      </div>


                                      <br>  <br>

                                      {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}





                                  </div><!--form_box-->
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

                              @foreach($PizzaTamanho as $tamanhos)
                                  <td align="center">{{$tamanhos->nombre}}</td>
                                  <td align="center">{{$tamanhos->cant_porcion}}</td>
                                  <td align="center">{{$tamanhos->cant_sabores}}</td>
                                  <td align="center"> {!! link_to_route('PizzaControlTamanho.edit', $title = 'Editar', $parameters = $tamanhos->codigo, $attributes = ['class'=>'fa fa-pencil btn btn-warning btn-xs']); !!}</td>
                                  <td align="center">
                                      {!! Form::open(['route'=>['PizzaControlTamanho.destroy',$tamanhos->codigo], 'method'=>'DELETE']) !!}
                                      {!! Form::submit('Eliminar ',['class'=>'fa fa-trash-o btn btn-danger btn-xs']) !!}
                                      {!!Form::close()!!}
                                  </td>


                                  <td align="center"> <a href="{{URL::to('PizzaControlTamanho/create/estadotamanho/'.$tamanhos->codigo)}}"><button class="btn {{$tamanhos->estado?' btn-danger':' btn-warning'}} btn-xs"><i class="fa {{$tamanhos->estado?'fa-check':'fa-times'}} "></i></button></a></td>



                                  </tr>
                              @endforeach
                              </tbody>

                          </table>

                          {!! $PizzaTamanho->render() !!}
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