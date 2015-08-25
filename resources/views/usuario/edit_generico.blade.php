@extends("admin.index")
@section("contenido")


    @include('usuario.'.$routes)
                    <div class="panel_cadastro">
                   <div class="ajuste_user">
                       {!!Form::model($extra,['route'=>[$formRoute.'.update',$extra->codigo], 'method'=>'PUT'])!!}
                       {!! Form::text('nombres',$extra->nombres,['class'=>'form-control','placeholder'=>'Ingrese su nombre']) !!}
                    <div class="btngrande">
                        {!! Form::submit('Actualizar',['class'=>' btn btn-warning']) !!}

                    </div>

                       {!!Form::close()!!}


                   </div>



                </div><!--panel_cadastro-->

@stop