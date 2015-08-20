@extends("admin.index")
@section("contenido")


    @include('usuario.pizzamenu')
                    <div class="panel_cadastro">
                   <div class="ajuste_user">
                       {!!Form::model($especialidadPizza,['route'=>['PizzaControl.update',$especialidadPizza->codigo], 'method'=>'PUT'])!!}
                       {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre']) !!}
                    <div class="btngrande">
                        {!! Form::submit('Actualizar',['class'=>' btn btn-warning']) !!}

                    </div>

                       {!!Form::close()!!}


                   </div>



                </div><!--panel_cadastro-->

@stop