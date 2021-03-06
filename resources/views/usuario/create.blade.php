@extends("admin.index")

@section("contenido")

        <!--main content start-->





        <div id='bok'class="col-lg-12"><!--blog de pedido-->
            <section class="panel">
                <div class="panel-body progress-panel">




                    <div class="ajuste_user">

                        {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}

                        @include('usuario.forms.usr')

                        {!! Form::submit('Registrar',['class'=>'btn btn-danger']) !!}

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

                                <table class="table">
                                    <thead>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th></th>

                                    </thead>

                                    @foreach($users as $user)
                                        <tbody>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>

                                        <td>{{$user->roles ? 'Administrador' : 'Operador'}}</td>
                                        <td>
                                            {!! link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->codigo, $attributes = ['class'=>'btn btn-warning']); !!}
                                        </td>

                                        </tbody>
                                    @endforeach

                                </table>
                                {!! $users->render() !!}



                                <!--espacio_mas_chico_fin-->
                            </div>
                        </div>
                    </section>

                </div><!--espacio-->




        </div> <!--panel-body progress-panel-->
    </section><!--panel-->

    </div><!--blog de pedido fin-->

    <!--****************************************************************-->




@stop