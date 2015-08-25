@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.'.$routes)
                          <!--manu fin-->
                          <div class=" col-lg-8"><!--contenido Pizza-->

                              <div class="cuadro_gris0">


                                  {!! Form::open(['route'=>$formRoute.'.store','method'=>'POST']) !!}
                                      <div class="form_box1">


                                              <h3 class="titulo_sabor" >Nuevas Especialidad</h3>
                                             {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre']) !!}

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
                                  <th>Activar</th>

                              </tr>
                              </thead>
                              <tbody class="">
                              @foreach($subcategoria as $cat_pizza)
                                  <tr class="">
                                      <td>{{$cat_pizza->nombre}}</td>

                                      <td align="center">



                                          {!! link_to_route($formRoute.'.edit', $title = 'Editar', $parameters = $cat_pizza->codigo, $attributes = ['class'=>'fa fa-pencil btn btn-warning btn-xs']); !!}

                                      </td>
                                      <td align="center">
                                          {!!Form::open(['route'=>[$formRoute.'.destroy',$cat_pizza->codigo], 'method'=>'DELETE'])!!}

                                          {!! Form::submit('Eliminar ',['class'=>'fa fa-trash-o btn btn-danger btn-xs']) !!}
                                          {!!Form::close()!!}


                                      </td>

                                      <td align="center"> <a href="{{URL::to($formRoute.'/create/estadoProduc/'.$cat_pizza->codigo)}}"><button class="btn {{$cat_pizza->estado?' btn-danger':' btn-warning'}} btn-xs"><i class="fa {{$cat_pizza->estado?'fa-check':'fa-times'}} "></i></button></a></td>

                                  </tr>
                              @endforeach


                              </tbody>

                          </table>
                          {!! $subcategoria->render() !!}


                      </div>

                  </div>

              </section>
                
</div><!--cuadro_de_cat-->
                                                 <!--listado de especialidad fin -->




                              </div><!--cuadro_gris-->





                          </div><!--contenido Pizza fin-->








                          <!--********************fin contenido de Paginas********************-->



@stop