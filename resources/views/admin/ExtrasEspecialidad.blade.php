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




                                  {!! Form::open(['route'=>$formRoute.'.store','method'=>'POST']) !!}


                                  <script type="text/javascript">
                                      $(document).ready(function() {
                                          $('#example-allSelectedText-includeSelectAllOption').multiselect({
                                              includeSelectAllOption: true,
                                              allSelectedText: 'No option left ...'
                                          });
                                      });
                                  </script>
                                  <div id="caja3">
                                      <h3 class="titulo_sabor" >Especialidad</h3>

                                      {!! Form::select('especialidad', $selectLomito, null,['id'=>'codedetaller','class'=>'form-control']) !!}

                                  <br>

                                      <h3 class="titulo_sabor" >Extras</h3>

                                      {!! Form::select('extras[]', $extraSelet, null,['id'=>'example-allSelectedText-includeSelectAllOption','class'=>'form-control',  'multiple'=>"multiple"]) !!}

                                <br>

                                      <h3 class="titulo_sabor" >Precio</h3>
                                      {!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'']) !!}

                               <br>

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
                                  <th>Nombre</th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>



                              </tr>
                              </thead>
                              <tbody class="">
                              @foreach($extras as $prodExtra)
                                  <tr class="">
                                      <td>{{$prodExtra->especialidad}}</td>
                                      <td>{{$prodExtra->extras}}</td>
                                      <td>{{\App\Moneda::guaranies($prodExtra->precio)}}</td>
                                      <td> {!! link_to_route($formRoute.'.edit', $title = 'Editar', $parameters = $prodExtra->codigo, $attributes = ['class'=>'fa fa-pencil btn btn-warning btn-xs']); !!}</td>
                                      <td align="center">
                                          {!!Form::open(['route'=>[$formRoute.'.destroy',$prodExtra->codigo], 'method'=>'DELETE'])!!}

                                          {!! Form::submit('Eliminar ',['class'=>'fa fa-trash-o btn btn-danger btn-xs']) !!}
                                          {!!Form::close()!!}


                                      </td>


                              @endforeach




                              </tbody>

                          </table>
                          {!! $extras->render() !!}


                      </div>

                  </div>

              </section>
                
</div><!--cuadro_de_cat-->
                                                 <!--listado de especialidad fin -->




                              </div><!--cuadro_gris-->





                          </div><!--contenido Pizza fin-->








                          <!--********************fin contenido de Paginas********************-->



@stop