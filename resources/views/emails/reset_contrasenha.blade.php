<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

</head>
<body>
    <div style="width: 70%; text-align: center; margin: 0 auto;">
        <div style="background: #721906; border-bottom: 20px solid #E4B900; width: 100%; height: 50px;">
            <img src="http://www.delcheff.com/img/logo-sin-moto.png" alt="Delcheff" title="Delcheff" style="max-height: 50px;">
        </div>
        <h1>Tu contraseña ha sido restablecida {{ $nombre_usuario }}!</h1><br>
        Puedes entrar nuevamente con la siguiente contraseña: {{ $nueva_contrasenha }} y a partir de ajustes cambiarla de nuevo.
        <br>
        <a href="http://www.delcheff.com" style="display: inline-block; background-color: #BF4730; border-radius:2px; border-bottom: solid 5px #AC402B; padding: 10px 15px; margin-top:20px; text-decoration: none; font-size: 1.7em; color:#FFF">
            Vamos a Delcheff.com
        </a>
    </div>
</body>
</html>