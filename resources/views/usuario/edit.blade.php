@extends("admin.index")
@include('alerts.success')
@section("contenido")
        <!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--state overview start-->

        <!--state overview end-->
        <!--panel principal-->




        <div id='bok'class="col-lg-12"><!--blog de pedido-->
            <section class="panel">
                <div class="panel-body progress-panel">

                    <div class="task-progress">
                        <h1><strong>Usuarios </strong></h1>
                    </div><!--task-progress-->
                    <hr>


                    <div class="ajuste_user">
                        {!!Form::model($user,['route'=>['usuario.update',$user->codigo], 'method'=>'PUT'])!!}
                        @include('usuario.forms.usr')

                            {!! Form::submit('Actualizar',['class'=>' btn btn-warning']) !!}
                            {!!Form::close()!!}
                        <br>

                            {!!Form::open(['route'=>['usuario.destroy',$user->codigo], 'method'=>'DELETE'])!!}

                            {!! Form::submit('Eliminar',['class'=>' btn btn-danger']) !!}
                            {!!Form::close()!!}







                    </div>
                    <hr>
                </div>
                <!-- page start-->
                <!-- page end-->






                <div class="espacio">
                    <section class="panel">
                        <header class="panel-heading">

                        </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
                                <div class="clearfix">
                                    <div class="btn-group">

                                    </div>
                                    <div class="btn-group pull-right">

                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="space15"></div>
                                <!--espacio_mas_chico-->




                                        <!--espacio_mas_chico_fin-->
                            </div>
                        </div>
                    </section>

                </div><!--espacio-->




        </div> <!--panel-body progress-panel-->
    </section><!--panel-->

    </div><!--blog de pedido fin-->

    <!--****************************************************************-->





    <script type="text/javascript">
        function ChangeItem(icon){

            if(icon.className.indexOf('green') > 0){
                icon.className = icon.className.replace('green', 'red');
            } else {
                icon.className = icon.className.replace('red', 'green');
            }
        }
    </script>
    <!--paginacion-->

    <!--paginacion fin-->
    <!--panel principal final-->
    <!--weather statement start-->

</section>

<!--weather statement end-->

</div>
</div>

</section>
</section>
@stop