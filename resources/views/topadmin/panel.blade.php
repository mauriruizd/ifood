@extends("topadmin.index")
@section("contenido")

        <!--<section id="main-content">
          <section class="wrapper">-->
<!--state overview start-->
<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="fa fa-money"></i>
            </div>
            <div class="value">
                <h1>{!!$totalPedidos!!}</h1>


                <p>TOTAL PEDIDOS</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="fa fa-tags"></i>
            </div>
            <div class="value">
                <!--<h1 class=" count2">
                    0
                </h1>-->
                <h1>{!!$totalEmpresas!!}</h1>


                <p>TOTAL EMPRESAS</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol yellow">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="value">
                <h1>{!!$totalCategoriasEmpresas!!}</h1>

                <p>TOTAL CATEGORIAS EMPRESAS</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol blue">
                <i class="fa fa-thumbs-up"></i>
            </div>
            <div class="value">
                <h1>{!!$totalCategoriasProductos!!}</h1>

                <p>TOTAL CATEORIAS PRODUCTOS</p>
            </div>
        </section>
    </div>
</div>
<!--state overview end-->
<!--panel principal-->

{{--<div id='bok' class="col-md-8"><!--blog de pedido-->--}}
    {{--<section class="panel">--}}
        {{--<div class="panel-body progress-panel">--}}

            {{--<div class="task-progress">--}}
                {{--<h1><strong>Pedidos </strong></h1>--}}
            {{--</div>--}}
            {{--<!--task-progress-->--}}
            {{--<button onclick="crear_orden()" class="new">Nueva Orden <strong class='fa fa-sign-in'> </strong></button>--}}

            {{--<hr>--}}
            {{--<div id='cuadro_pedido' class="cuadro_pedido">--}}
                {{--<div class="pedido_llegados">--}}
                    {{--<div>--}}
                        {{--<div class="titulo_orden">N° de Pedido 3659 <i id='down' class="fa fa-toggle-down (alias)"></i>--}}
                        {{--</div>--}}
                        {{--<!--titulo_orden-->--}}
                        {{--<div class="info_box">--}}
                            {{--<p><i class="bol">Nombre: </i>Marcos Martinez</p>--}}

                            {{--<p><i class="bol">Telefono: </i>0978655845</p>--}}

                            {{--<p><i class="bol">Dirección: </i>Barrio San jose al costado de colegio camino de empedrado a--}}
                                {{--tres cuadras de </p>--}}

                            {{--<div class="room-box">--}}
                                {{--<h5 class="text-primary"><strong>Pedido: Pizza</strong></h5>--}}

                                {{--<p><span class="text-muted">cantidad :</span> 1 </p>--}}

                                {{--<p><span class="text-muted">Tamanho :</span> Grande </p>--}}

                                {{--<p><span class="text-muted">Masa :</span> fina </p>--}}

                                {{--<p><span class="text-muted">Sabor :</span> 4 quersos, peperoni</p>--}}

                                {{--<p><span class="text-muted">Destalle :</span>favor si puede sacar el tomate y sim--}}
                                    {{--pimienta</p>--}}

                                {{--<p><h5><i class="text-primary"><strong>Monto:</strong> </i>180.000 Gs.</h5></p>--}}
                            {{--</div>--}}
                            {{--<button type="button" id="boton_eliminar" class="btn btn-danger btn-delete">--}}
                                {{--<i class="glyphicon glyphicon-trash"></i>--}}
                                {{--<span>Eliminar</span>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                        {{--<!--info_box-->--}}
                    {{--</div>--}}
                {{--</div>--}}


    {{--</section>--}}
    {{--<!--panel-->--}}

{{--</div><!--blog de pedido fin-->--}}

<!--****************************************************************-->

<div class="col-md-4"><!--blog de pedido-->
    <section class="panel">
        <div id='panel-body' class="panel-body progress-panel">
            <div class="task-progress">
                <h1><strong>Ordenes </strong></h1>
            </div>
            <!--task-progress-->

            <hr>
            <div id='seleccion_ordenes' class="seleccion_ordenes">
                <div class="orden_cocina">
                    <p id="text_orden"> Entrada de Cocina N° 1</p><!--text_orden-->
                </div>
                <!--orden_cocina-->
                <div class="select_ordenes">

                </div>
                <!--select_ordenes-->
                <button type="button" class="eliminar btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Eliminar</span>
                </button>
                <button onclick="print()" title="" data-placement="top" data-toggle="tooltip" type="button"
                        data-original-title="Print" class="btn btn-warning"><i class="fa fa-print"></i> Imprimir
                </button>
            </div>
            <!--seleccion_ordenes-->

        </div>
        <!--panel-body progress-panel-->
    </section>
    <!--panel-->
</div><!--blog de pedido fin-->


<script type="text/javascript">
    function ChangeItem(icon) {

        if (icon.className.indexOf('green') > 0) {
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