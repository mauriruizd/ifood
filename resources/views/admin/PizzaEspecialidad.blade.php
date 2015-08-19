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
                                              <h3 class="titulo_sabor" >Especialidad</h3>

                                           {!! Form::select('especialidad', $selectDetalle, null,['id'=>'codedetaller','class'=>'form-control']) !!}

                                          </div>


                                          <div id="caja3">
                                              <h3 class="titulo_sabor" >Detalle</h3>
                                              {!! Form::textarea('descrip', null, ['class' => 'texto form-control ','size' => '30x5']) !!}


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

                                  <!--*****************************************-->

                                  <div class="col-lg-6">
                                      <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Busca rapida...">
                                      <span class="input-group-btn">
                                        <button class="btn btn-warning" type="button"><i class="fa  fa-search"></i></button>
                                      </span>
                                      </div><!-- /input-group -->
                                  </div><!-- /.col-lg-6 -->
                                  <br><br>
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
                                                          <th align="center">Sabor</th>
                                                          <th align="center">Especialidad</th>
                                                          <th align="center">Detalle</th>
                                                          <th align="center">Imagen</th>

                                                          <th></th>
                                                          <th></th>
                                                          <th align="center">Activar</th>

                                                      </tr>

                                                      </thead>
                                                      <tbody class="">



                                                      @foreach($listaProd as $tamanhos)
                                                          <td align="center">{{$tamanhos->denominacion}}</td>
                                                          <td align="center">{{$tamanhos->especialidad_nombre}}</td>
                                                          <td align="center">{{$tamanhos->descripcion}}</td>

                                                          <td class="imgproductos" align="center"><img  src=" {{ URL::to($tamanhos->imagen_url )}}"></td>
                                                          <td align="center"> {!! link_to_route('PizzaControlProducto.edit', $title = 'Editar', $parameters = $tamanhos->codigo, $attributes = ['class'=>'fa fa-pencil btn btn-warning btn-xs']); !!}</td>
                                                          <td align="center">
                                                              {!! Form::open(['route'=>['PizzaControlProducto.destroy',$tamanhos->codigo], 'method'=>'DELETE']) !!}
                                                              {!! Form::submit('Eliminar ',['class'=>'fa fa-trash-o btn btn-danger btn-xs']) !!}
                                                              {!!Form::close()!!}
                                                          </td>


                                                          <td align="center"> <a href="{{URL::to('PizzaControlProducto/create/estadoProduc/'.$tamanhos->codigo)}}"><button class="btn {{$tamanhos->estado?' btn-danger':' btn-warning'}} btn-xs"><i class="fa {{$tamanhos->estado?'fa-check':'fa-times'}} "></i></button></a></td>



                                                          </tr>
                                                      @endforeach
                                                      </tbody>

                                                  </table>



                                              </div>

                                          </div>

                                      </section>

                                  </div><!--cuadro_de_cat-->
                                  <!--*****************************************-->



                              </div><!--cuadro_gris-->







                          </div><!--contenido Pizza fin-->













                          <!--********************fin contenido de Paginas********************-->



@stop