@extends("admin.index")
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
                        <h1><strong>Producto / Cadastro / Hamburguesas</strong></h1>
                    </div><!--task-progress-->
                    <hr>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.accordion__content:not(:first)').hide();
                            $('.accordion__title:first-child').addClass('active');
                            $('.accordion__title').on('click', function() {
                                $('.accordion__content').hide();
                                $(this).next().show().prev().addClass('active').siblings().removeClass('active');
                            });
                        });
                    </script>

                    <div class="panel_cadastro">
                        <dl class="accordion">
                            <dt class="accordion__title">Sabores</dt>
                            <dd class="accordion__content">
                                <div class="cuadro_gris">


                                    <form class="text_class" role="form">
                                        <div class="form_box">
                                            <div id="caja">
                                                <h3 class="titulo_sabor" >Sabor</h3>
                                                <input id="publish_ad_title" maxlength="130" name="ad[title]" type="text">
                                            </div>

                                            <div id="caja">
                                                <h3 class="titulo_sabor" >categorias</h3>

                                                <select>
                                                    <option value="1">clasicas</option>
                                                    <option value="2">premiun</option>
                                                    <option value="3">de la casa</option>
                                                    <option value="4">especial</option>
                                                </select>
                                            </div>



                                            <h3 class="titulo_sabor" >Detalle</h3>

                                            <textarea rows="4" cols="50"></textarea>
                                            <br>
                                            <br>

                                            <!--******************************-->
                                            <div class="form-group">
                                                <input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
                                            </div>
                                            <br>
                                            <br>
                                            <!--****************************-->

                                            <button type="submit" class="btn btn-danger">Guardar</button>
                                        </div><!--form_box-->

                                    </form>
                                </div><!--cuadro_gris-->
                                <div class="cuadro_gris0">

                                    <section class="panel">
                                        <header class="panel-heading">

                                        </header>
                                        <div class="panel-body">
                                            <div class="adv-table editable-table ">

                                                <div class="space15"></div>
                                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                                    <thead>
                                                    <tr>
                                                        <th>Sabor</th>
                                                        <th>Categoria</th>
                                                        <th>Precio</th>
                                                        <th>Detaller</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th >Activar</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="">
                                                        <td>Clasica</td>
                                                        <td>4 queso</td>
                                                        <td>4 queso</td>
                                                        <td>peperoni, tomate, salsa, queso</td>
                                                        <td align="center" class="img_promo"><img src="{{URL::to('admin/imagen/ham.jpg')}}"></td>
                                                        <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                                        <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>
                                                        <td align="center">

                                                            <section>
                                                                <!-- Checbox Four -->
                                                                <div class="checkboxFour">
                                                                    <input type="checkbox" value="0" id="checkboxFourInput" name="" checked />
                                                                    <label for="checkboxFourInput"></label>
                                                                </div>
                                                            </section>
                                                        </td>

                                                    </tr>

                                                    <tr class="">
                                                        <td>de la casa</td>
                                                        <td>clasicas</td>
                                                        <td>4 queso</td>
                                                        <td>clasicas</td>
                                                        <td align="center" class="img_promo"><img src="{{URL::to('admin/imagen/ham1.jpg')}}"></td>
                                                        <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                                        <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>
                                                        <td align="center">

                                                            <section>
                                                                <!-- Checbox Four -->
                                                                <div class="checkboxFour">
                                                                    <input type="checkbox" value="1" id="1" name="" checked />
                                                                    <label for="1"></label>
                                                                </div>
                                                            </section>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-sm pull-right">
                                                    <li><a href="#">«</a></li>
                                                    <li><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>

                                                    <li><a href="#">»</a></li>
                                                </ul>


                                            </div>
                                        </div>

                                    </section>
                                </div><!--cuadro_gris-->


                            </dd>

                            <!--**********************************-->

                            <dt class="accordion__title">Configuraciones</dt>
                            <dd class="accordion__content" id='blok'>

                                <div class="cuadro_gris1">


                                    <form class="text_class" role="form">
                                        <div class="form_box">
                                            <div id="caja">
                                                <h3 class="titulo_sabor" >Nuevas Categoria</h3>
                                                <input id="publish_ad_title" maxlength="130" name="ad[title]" type="text">
                                            </div>
                                            <div id="caja">
                                                <br>
                                                <button type="submit" class="btn btn-danger">Guardar</button>
                                            </div>
                                        </div><!--form_box-->

                                    </form>

                                    <div class="cuadro_de_cat">
                                        <section class="panel">
                                            <header class="panel-heading">

                                            </header>
                                            <div class="panel-body">
                                                <div class="adv-table editable-table ">

                                                    <div class="space15"></div>
                                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                                        <thead>
                                                        <tr>
                                                            <th>Categorias</th>
                                                            <th></th>
                                                            <th></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="">
                                                            <td>clasicas</td>

                                                            <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                                            <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>



                                                        </tr>
                                                        <tr class="">
                                                            <td>Premiun</td>
                                                            <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                                            <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>




                                                        </tr>
                                                        <tr class="">
                                                            <td>de la casa</td>
                                                            <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                                            <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>


                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </section>

                                    </div><!--cuadro_de_cat-->




                                </div>






                            </dd>



                            <!--**********************************-->

                            <dt class="accordion__title">Extras</dt>
                            <dd class="accordion__content" id='blok'>

                                <div class="cuadro_gris1">

                                    <form class="text_class" role="form">
                                        <div class="form_box">
                                            <div id="caja">
                                                <h3 class="titulo_sabor" >Ingrediente Adicionales</h3>
                                                <input id="publish_ad_title" maxlength="130" name="ad[title]" type="text">
                                            </div>
                                            <div id="caja1">
                                                <h3 class="titulo_sabor" >Precio</h3>
                                                <input id="publish_ad_title" maxlength="130" name="ad[title]" type="text">
                                            </div>
                                            <div id="caja">
                                                <br>
                                                <button type="submit" class="btn btn-danger">Guardar</button>
                                            </div>
                                        </div><!--form_box-->

                                    </form>

                                    <div class="cuadro_de_cat">
                                        <section class="panel">
                                            <header class="panel-heading">

                                            </header>
                                            <div class="panel-body">
                                                <div class="adv-table editable-table ">

                                                    <div class="space15"></div>
                                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                                        <thead>
                                                        <tr>
                                                            <th>Adicionales</th>
                                                            <th>Precio</th>
                                                            <th></th>
                                                            <th></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="">
                                                            <td>Tomate</td>
                                                            <td>5.500Gs.</td>
                                                            <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                                            <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>



                                                        </tr>
                                                        <tr class="">
                                                            <td>Peperoni</td>
                                                            <td>5.500Gs.</td>
                                                            <td align="center"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></td>
                                                            <td align="center"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>




                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <!---segundo fin-->


                    </div><!--cuadro_de_cat-->


                </div

                </dd>



                <!--*********************************-->





                </dl>


        </div><!--panel_cadastro-->
        </div>









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



<!--main content end-->
@stop