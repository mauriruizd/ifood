<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login | DelCheff</title>

    <!-- Bootstrap core CSS -->

    <link href="{{URL::to('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::to('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{URL::to('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('admin/css/style-responsive.css')}}" rel="stylesheet">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{URL::to('admin/js/html5shiv.js')}}"></script>
    <script src="{{URL::to('admin/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        border: 0;
        position: relative;
    }
    html, body {
        position: fixed;
        width: 100%;
        height: 100%;
        background: url('/admin/imagen/login-bg.jpg') 50% 50% no-repeat;
        background-size: cover;
    }
    .logo{
        width: 300px;
        height: 200px;
        top:10px;
        text-align: center;
        margin: 0 auto;
        padding: 0;
    }
</style>
<body >
@include('alerts.errors')
@include('alerts.request')

<div class="fondo">
    <div class="container">

        <div class="form-signin">
            <h2 class="logo"><img src="{{URL::to('admin/imagen/delcheff-logo-web.png')}}"></h2>
            <div class="login-wrap">
                {!!Form::open(['route'=>'topadmin.login','method'=>'POST'])!!}
                <div class="form-group">
                    {!!Form::label('correo','Correo:')!!}
                    {!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu usuario'])!!}
                </div>

                <div class="form-group">
                    {!!Form::label('contrasena','Contraseña:')!!}
                    {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}

                </div>
                <div class="form-group">
                {{--{!!Form::checkbox('name', 'value', true)!!} Recuerdarme--}}
                    <a data-toggle="modal" href="#myModal"> Olvidaste tu Password ?</a>
                    </div>
                {!!Form::submit('Iniciar',['class'=>'"btn btn-lg btn-login btn-block'])!!}

                {!!Form::close()!!}
            </div>


        </div>





    </div>

</div><!--fondo-->



<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>
