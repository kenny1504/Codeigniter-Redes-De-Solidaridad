<!DOCTYPE html>
<html>
<head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="assets/lte/dist/img/logo.png">
        <title> login | Redes De Solidaridad</title> <!-- Titulo de la pagina-->
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
         <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
        <link  rel="stylesheet" type="text/css" href="assets/lte/bower_components/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/bower_components/Ionicons/css/ionicons.min.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/dist/css/AdminLTE.min.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/dist/css/skins/_all-skins.min.css" >     
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo" style="color: white;">
  <b>Redes</b><a style="color: white;"> de </a><b>Solidaridad</b>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"> 
        <a >    <?php        
                $session = \Config\Services::session();    // uso de varibles de session
                $session->start();
                echo $_SESSION['Nombre'];
            ?>  
           </a> 
</div>
   <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="assets/lte/dist/img/user1-128x128.jpg" alt="User Image">
    </div>
    <!-- lockscreen credentials (contains the form) -->
    <form id="login2" class="lockscreen-credentials">
      <div class="input-group">
        <input  name="username" class="form-control hidden" value="<?php echo $_SESSION['NombreDeUsuario'];?>">
        <input type="password" name="password" class="form-control" placeholder="Contraseña">
        <div class="input-group-btn">
        <button id="exito2" onclick="login2()" type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form> <!-- /.lockscreen credentials -->
  </div><!-- /.lockscreen-item --> 
  <label id="error" class="help-block  hidden text-center" style="color: red;" >Contraseña Incorrecta</label>
  <div class="help-block text-center" style="color: white;">
    Ingrese su contraseña para iniciar sesion
  </div>
  <div class="text-center">
    <a href="<?php base_url()?>.">Ingresar con otra cuenta de usuario</a>
  </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="lockscreen-footer text-center" style="color: white;">
  <a> Copyright &copy; 2019 <b><a>UNAN-Managua</a></b><br>
  <a>All rights reserved</a>
  </div>
</div>
<!-- jQuery 3 -->
<script type="text/javascript" src="login.js"> </script>
<script type="text/javascript" src="assets/lte/bower_components/jquery/dist/jquery.min.js"> </script>
<script type="text/javascript" src="assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js"> </script>
</body>  
</html>

