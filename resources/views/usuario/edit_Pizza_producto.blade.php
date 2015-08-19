@extends("admin.index")
@section("contenido")
        <!--main content start-->


@include('usuario.pizzamenu')

                    <div class="panel_cadastro">
                   <div class="ajuste_user">


                       {!! Form::model($ProductoPizza,['route'=>['PizzaControlProducto.update',$ProductoPizza->codigo],'method'=>'PUT','files' => true]) !!}


                       <div id="caja3">
                           <h3 class="titulo_sabor" >Sabor</h3>
                           {!! Form::text('denominacion',$ProductoPizza->denominacion,['class'=>'form-control','placeholder'=>'']) !!}
                       </div>
                       <div id="caja3">
                           <h3 class="titulo_sabor" >Especialidad</h3>

                           {!! Form::select('especialidad', $selectDetalle, $ProductoPizza->especialidad_codigo,['id'=>'codedetaller','class'=>'form-control']) !!}

                       </div>


                       <div id="caja3">
                           <h3 class="titulo_sabor" >Detalle</h3>
                           {!! Form::textarea('descripcion', $ProductoPizza->descripcion, ['class' => 'texto form-control ','size' => '30x5']) !!}


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













                   </div>



                </div><!--panel_cadastro-->






<!--main content end-->
@stop