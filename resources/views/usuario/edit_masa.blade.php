@extends("admin.index")
@section("contenido")


    @include('usuario.pizzamenu')
                    <div class="panel_cadastro">
                   <div class="ajuste_user">
                       {!!Form::model($masaPizza,['route'=>['PizzaControlMasa.update',$masaPizza->codigo], 'method'=>'PUT'])!!}
                       {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre']) !!}
                    <div class="btngrande">
                        {!! Form::submit('Actualiza',['class'=>' btn btn-warning']) !!}

                    </div>

                       {!!Form::close()!!}


                   </div>



                </div><!--panel_cadastro-->

@stop