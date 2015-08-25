@extends("admin.index")
@section("contenido")


    @include('usuario.'.$routes)
                    <div class="panel_cadastro">
                   <div class="ajuste_user">
                       {!!Form::model($especialidad,['route'=>[$formRoute.'.update',$especialidad->codigo], 'method'=>'PUT'])!!}
                       {!! Form::text('nombre',$especialidad->nombre,['class'=>'form-control','placeholder'=>'Ingrese su nombre']) !!}
                    <div class="btngrande">
                        {!! Form::submit('Actualizar',['class'=>' btn btn-warning']) !!}

                    </div>

                       {!!Form::close()!!}


                   </div>



                </div><!--panel_cadastro-->

@stop