@extends("admin.index")
@section("contenido")


    @include('usuario.'.$routes)
                    <div class="panel_cadastro">
                   <div class="ajuste_user">


                       {!!Form::model($extras,['route'=>[$formRoute.'.update',$extras->codigo], 'method'=>'PUT'])!!}


                       <script type="text/javascript">
                           $(document).ready(function() {
                               $('#example-checkboxName').multiselect({
                                   checkboxName: 'multiselect[]'
                               });
                           });
                       </script>
                       <div id="caja3">
                           <h3 class="titulo_sabor" >Especialidad</h3>

                           {!! Form::select('especialidad', $subcategoriasSelect, $extras->subcategoria_codigo,['id'=>'codedetaller','class'=>'form-control']) !!}

                           <br>

                           <h3 class="titulo_sabor" >Extras</h3>

                           {!! Form::select('extras', $extraSelet, $extras->pextra_codigo,['id'=>'example-checkboxName','class'=>'form-control']) !!}

                           <br>

                           <h3 class="titulo_sabor" >Precio</h3>
                           {!! Form::text('precio',number_format($extras->precio_extra,0,'',''),['class'=>'form-control','placeholder'=>'']) !!}

                           <br>

                           {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}

                       </div>


                       {!! Form::close() !!}
                               <!--listado de especialidad-->












                   </div>



                </div><!--panel_cadastro-->

@stop