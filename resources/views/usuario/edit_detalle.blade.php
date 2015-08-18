@extends("admin.index")
@section("contenido")
        <!--main content start-->


@include('usuario.pizzamenu')

                    <div class="panel_cadastro">
                   <div class="ajuste_user">


                       {!! Form::open(['route'=>['PizzaControlDetalle.update',$detaPizza->codigo],'method'=>'PUT']) !!}

                       <div id="caja2">
                           <h3 class="titulo_sabor" >Nuevas Especialidad</h3>
                           {!! Form::select('especialidad', $selectEspecie, $detaPizza->cat_pizza_esp_codigo, ['id' => 'codespecie', 'class' => 'form-control']) !!}

                       </div>
                       <div id="caja2">
                           <h3 class="titulo_sabor" >Tamanho</h3>
                           {!! Form::select('tamanho', $selectTamanho, $detaPizza->cat_pizza_tamanho_codigo, ['id' => 'codetamanho', 'class' => 'form-control']) !!}


                       </div>
                       <div id="caja2">
                           <h3 class="titulo_sabor" >Masa</h3>
                           {!! Form::select('masa', $selectMasa,  $detaPizza->cat_pizza_masa_codigo, ['id' => 'codemasa', 'class' => 'form-control']) !!}

                       </div>
                       <div id="caja2">

                           <h3 class="titulo_sabor" >Precio</h3>
                           {!! Form::text('precio',number_format($detaPizza->precio,0,'',''),['class'=>'form-control','placeholder'=>'']) !!}
                       </div>






                       <br>



                       <!--****************************-->

                       <div class="btngrande">

                           {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}
                       </div>
                       {!! Form::close() !!}












                   </div>



                </div><!--panel_cadastro-->






<!--main content end-->
@stop