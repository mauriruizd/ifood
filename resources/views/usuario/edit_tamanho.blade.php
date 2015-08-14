@extends("admin.index")
@section("contenido")
        <!--main content start-->


@include('usuario.pizzamenu')

                    <div class="panel_cadastro">
                   <div class="ajuste_user">
                       {!!Form::model($tamanhodelete,['route'=>['PizzaControlTamanho.update',$tamanhodelete->codigo], 'method'=>'PUT'])!!}
                       <h3 class="titulo_sabor">Tamanho</h3>
                       {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre']) !!}
                       <h3 class="titulo_sabor">Porciones</h3>
                       {!! Form::text('cant_porcion',null,['class'=>'form-control','placeholder'=>'Ingrese cantidad porcianes']) !!}
                       <h3 class="titulo_sabor">Sabores</h3>
                       {!! Form::text('cant_sabores',null,['class'=>'form-control','placeholder'=>'Ingrese cantidad sabores']) !!}
                       <div class="btngrande">
                       {!! Form::submit('Actualizar',['class'=>' btn btn-warning']) !!}
                           </div>
                       {!!Form::close()!!}





                   </div>



                </div><!--panel_cadastro-->






<!--main content end-->
@stop