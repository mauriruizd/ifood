@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.'.$routes)
                          <!--manu fin-->
                          <div class=" col-lg-8"><!--contenido Pizza-->

                              <div class="cuadro_gris0">



                                  {!! Form::open(['route'=>$formRoute.'.store','method'=>'POST','files' => true]) !!}

                                      <div id="caja3">
                                          <h3 class="titulo_sabor">Nombre</h3>
                                          {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'']) !!}

                                      </div>

                                      <div id="caja3">
                                          <h3 class="titulo_sabor" >Especialidad</h3>

                                          {!! Form::select('especialidad', $selectLomito, null,['id'=>'codedetaller','class'=>'form-control']) !!}

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
                                      {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'']) !!}

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
                                  <th align="center">Nombre</th>
                                  <th align="center">Especialidad</th>
                                  <th align="center">Detalle</th>

                                  <th align="center">Imagen</th>
                                  <th align="center">Precio</th>


                                  <th></th>
                                  <th></th>
                                  <th align="center">Activar</th>

                              </tr>
                              </thead>
                              <tbody class="">
                              @foreach($lomitoProducto as $lomitoProductos)
                                  <tr class="">
                                      <td>{{$lomitoProductos->denominacion}}</td>
                                      <td>{{$lomitoProductos->subcat_nombre}}</td>
                                      <td>{{$lomitoProductos->descripcion}}</td>
                                      <td class="imgproductos" align="center">
                                         <img  src=" {{ URL::to($lomitoProductos->imagen_url )}}">
                                      </td>


                                      <td>{{\App\Moneda::guaranies($lomitoProductos->precio)}}</td>
                                      <td align="center">



                                          {!! link_to_route($formRoute.'.edit', $title = 'Editar', $parameters = $lomitoProductos->codigo, $attributes = ['class'=>'fa fa-pencil btn btn-warning btn-xs']); !!}

                                      </td>
                                      <td align="center">
                                          {!!Form::open(['route'=>[$formRoute.'.destroy',$lomitoProductos->codigo], 'method'=>'DELETE'])!!}

                                          {!! Form::submit('Eliminar ',['class'=>'fa fa-trash-o btn btn-danger btn-xs']) !!}
                                          {!!Form::close()!!}


                                      </td>
                                      <td align="center"> <a href="{{URL::to($formRoute.'/create/estadoProduc/'.$lomitoProductos->codigo)}}"><button class="btn {{$lomitoProductos->estado?' btn-danger':' btn-warning'}} btn-xs"><i class="fa {{$lomitoProductos->estado?'fa-check':'fa-times'}} "></i></button></a></td>



                                  </tr>
                              @endforeach

                              </tbody>

                          </table>
                        {!! $lomitoProducto->render() !!}



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