@extends("admin.index")
@section("contenido")





                          <!--********************contenido de Paginas************************-->
                          <!--manu-->
@include('usuario.pizzamenu')
                          <!--manu fin-->
                          <div class="col-lg-3"><!--contenido Pizza-->

                              <div class="cuadro_gris">



                                      <div class="form_box">

                                              <h3 class="titulo_sabor" >Sabor</h3>
                                              <input type="text" class="form-control">
                                          <br>

                                              <h3 class="titulo_sabor" >categorias</h3>

                                              <select class="form-control">
                                                  <option value="1">clasicas</option>
                                                  <option value="2">premiun</option>
                                                  <option value="3">de la casa</option>
                                                  <option value="4">especial</option>
                                              </select>


                                          <h3 class="titulo_sabor" >Detalle</h3>

                                          <textarea class="form-control" rows="4" cols="50"></textarea>
                                          <br>
                                          <br>
                                          <!--******************************-->
                                          <div class="form-group">
                                              <input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
                                          </div>
                                          <br>
                                          <br>
                                          <!--****************************-->

                                                <div class="btngrande">

                                              <button type="submit" class=" btn btn-danger">Guardar</button>
                                                </div>


                                      </div><!--form_box-->

                              </div><!--cuadro_gris-->





                          </div><!--contenido Pizza fin-->

                          <div class=" col-lg-8"><!--tamanho grande-->
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
                                                      <th>Categorias</th>
                                                      <th>Sabor</th>
                                                      <th>Descripcion</th>
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
                                                      <td align="center" class="img_promo"><img src="{{URL::to('admin/imagen/promo.jpeg')}}"></td>
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
                                                      <td>clasicas</td>
                                                      <td align="center" class="img_promo"><img src="{{URL::to('admin/imagen/promo.jpeg')}}"></td>
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

                              </div><!--cuadro_gris0 fin-->

                          </div>

                          </div><!--tamanho grande fin-->





                          <!--********************fin contenido de Paginas********************-->



@stop