<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="assets/lte/dist/img/logo.png">
        <title>login | Redes De Solidaridad</title> <!-- Titulo de la pagina-->
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="login.css" type="text/css">
</head>
<body >
<form name="login"  id="login" action="inicio">
<div class="wrapper">
  <div class="rec-prism">
    <div class="face face-front">
      <div class="content">
        <h3>Inicio de Sesion</h3>
        <form onsubmit="">
        <br>
          <div class="field-wrapper">
            <input type="text" name="username" placeholder="username">
            <label>Usuario</label>
          </div>
          <div class="field-wrapper">
            <input type="password" name="password" placeholder="password" autocomplete="new-password">
            <label>Contraseña</label>
          </div>
          <div class="field-wrapper">
            <input  style="text-align: center;" id="exito" type="" value="Enviar" onclick="showThankYou()">
          </div>
        </form>
      </div>
    </div>
    <div class="face face-right">
      <div class="content">
        <h1 style="color:#ff00008a">Credenciales incorrectas</h1>
       <h3  style="color:#ff00008a">El usuario o contraseña que ha ingresado es incorrecto o esta caducado</h3> 
        <form onsubmit="event.preventDefault()">
          <h1><i class="fa fa-fw fa-frown-o"></i></h1> 
          <div class="field-wrapper">
          <input  style="text-align: center;" id="exito" type="" value="Intente nuevamente" onclick="showLogin()">
          </div>
        </form>
      </div>
    </div>
    <div class="face face-bottom">
      <div class="content">
        <div class="thank-you-msg">
          Bienvenido!
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<script type="text/javascript" src="login.js"> </script>
<script type="text/javascript" src="assets/lte/bower_components/jquery/dist/jquery.min.js"> </script>
</body>
</html>


