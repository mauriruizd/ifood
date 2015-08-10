<!DOCTYPE html>
<html lang="en" ng-app="miAp" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{URL::to('admin/img/favicon.png')}}">

    <title>DelCheff</title>


        <link href="{{URL::to('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::to('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{URL::to('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{URL::to('admin/css/owl.carousel.css')}}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{URL::to('admin/css/style.css')}}" rel="stylesheet">
     <link href="{{URL::to('admin/css/promociones.css')}}" rel="stylesheet">
    <link href="{{URL::to('admin/css/style-responsive.css')}}" rel="stylesheet" />
     <link href="{{URL::to('admin/docs/stylo.css')}}" rel="stylesheet">

      <link href="{{URL::to('admin/css/fileinput.css')}}" rel="stylesheet" />


         <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{URL::to('admin/js/jquery.js')}}"></script>
   <script src="{{URL::to('admin/js/jquery-ui.js')}}"></script>

    <script src="{{URL::to('admin/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{URL::to('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{URL::to('admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{URL::to('admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>

    <script src="{{URL::to('admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{URL::to('admin/js/owl.carousel.js')}}" ></script>
    <script src="{{URL::to('admin/js/jquery.customSelect.min.js')}}" ></script>
    <script src="" ></script>

    <!--common script for all pages-->
   <script src="{{URL::to('admin/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{URL::to('admin/js/sparkline-chart.js')}}"></script>
    <script src="{{URL::to('admin/js/easy-pie-chart.js')}}"></script>
    <script src="{{URL::to('admin/js/count.js')}}"></script>
      <!--archivos de input bootstrap-->
      <script src="{{URL::to('admin/js/fileinput.min.js')}}"></script>




      <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
              autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>



    
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
  <script src="http://code.angularjs.org/1.3.14/i18n/angular-locale_es-mx.js"></script>-->
  <!--<script src="filtros.js"></script>-->


   
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  

  <body ng-controller="ControladorFiltros">

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <!--<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>-->
              </div>
            <!--logo start-->
            <a href="{{URL::to('control')}}" class="logo"><img src="{{URL::to('admin/imagen/logo.png')}}"></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
              
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <!-- <img alt="" src="{{URL::to('admin/img/avatar1_small.jpg')}}">-->
                            <span class="username">{!! Auth::user()->name !!}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                          <!--  <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>-->
                            <li class="red"><a href="/logout"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="{{URL::to('control/')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Pedidos</span>
                      </a>
                  </li>

                   <li>
                      <a href="{{URL::to('control/usuarios')}}" >
                          <i class="fa fa-user"></i>
                          <span>Usuarios </span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Productos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::to('control/cadastro')}}">Cadastro</a></li>
                          <li><a  href="{{URL::to('control/promociones')}}">Promociones</a></li>
                        
                      </ul>
                  </li>
                  @if(Auth::user()->roles==1)

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>configuraciones</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="grids.html">Informe de Empresa</a></li>
                          <li><a  href="calendar.html">Cotizaciones</a></li>
                      </ul>
                  </li>

                  @endif



                  <!--multi level menu start-->

                  <!--multi level menu end-->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->


      <!--main content start-->

@yield("contenido")
      


      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer1">
          <div class="text-center">
          <br>
              2015 &copy; Wigo Creative www.Wigolabs.com
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

   <!-- Bootstrap core CSS -->



   




  </body>
</html>
