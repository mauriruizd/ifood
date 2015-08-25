@extends("admin.index")
@section("contenido")


    @include('usuario.'.$routes)
                    <div class="panel_cadastro">
                   <div class="ajuste_user">

                       {!!Form::model($producto,['route'=>[$formRoute.'.update',$producto->codigo], 'method'=>'PUT','files' => true])!!}


                       <div id="caja3">
                           <h3 class="titulo_sabor">Nombre</h3>
                           {!! Form::text('denominacion',$producto->denominacion,['class'=>'form-control','placeholder'=>'']) !!}

                       </div>

                       <div id="caja3">
                           <h3 class="titulo_sabor" >Especialidad</h3>

                           {!! Form::select('subcategoria_codigo', $selectLomito, $producto->subcategoria_codigo,['id'=>'codedetaller','class'=>'form-control']) !!}

                       </div>
                       <div id="caja3">
                           <h3 class="titulo_sabor" >Detalle</h3>
                           {!! Form::textarea('descripcion', $producto->descripcion, ['class' => 'texto form-control ','size' => '30x5']) !!}


                       </div>
                       <div id="caja3">
                           <div class="">
                               <h3 class="titulo_sabor" >Imagen</h3>

                               {!! Form::file('image',['id'=>'file-1','class'=>'file']) !!}

                           </div>
                       </div>
                       <div id="caja3">
                           <h3 class="titulo_sabor1">Precio</h3>
                           {!! Form::text('precio',number_format($producto->precio,0,'',''),['class'=>'form-control','placeholder'=>'']) !!}

                       </div>




                       <div id="caja3">
                           {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}

                       </div>




                       {!! Form::close() !!}




                   </div>
                </div><!--panel_cadastro-->

@stop