<!DOCTYPE html>
<html>
<head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="assets/lte/dist/img/logo.png">
        <title> <?=$this->renderSection('titulo')?> | Redes De Solidaridad</title> <!-- Titulo de la pagina-->
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
         <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
        <!-- Font Awesome -->
        <link  rel="stylesheet" type="text/css" href="assets/lte/bower_components/font-awesome/css/font-awesome.min.css" >
        <!-- Ionicons -->
        <link rel="stylesheet" type="text/css" href="assets/lte/bower_components/Ionicons/css/ionicons.min.css" >
        <!-- Theme style -->
        <link rel="stylesheet" type="text/css" href="assets/lte/dist/css/AdminLTE.min.css" >
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" type="text/css" href="assets/lte/dist/css/skins/_all-skins.min.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" >     
</head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
<!-- Site wrapper -->
       <div class="wrapper">     
                    <!--inicio header-->
                  <?= $this->include("theme/lte/usuario.blade.php") ?> <!-- vista contiene todos los datos del usuario SIEMPRE INCLUIR EN TODAS LAS VISTAS -->
                  <?= $this->include("theme/lte/hearder.blade.php")  ?><!-- Hearder de la pagina inicio-->
                    <!--fin header -->
                    <!--inicio aside -->
                    <?= $this->include("theme/lte/aside.blade.php") ?><!-- aside o menu lateral de la pagina inicio-->
                    <!--fin aside -->
 <div class="content-wrapper">  
                <section class="content-header">
                   <?= $this->renderSection ('contenido') ?>  <!-- Contenido dinamico-->
                </section> 
                    <!--******** include de Materia ********-->                           
                    <?= $this->include("Materia/crear.blade.php") ?><!-- Modal crear materia-->
                    <?= $this->include("Materia/eliminar.blade.php") ?><!-- Modal eliminar materia-->      
                    <?= $this->include("Materia/editar.blade.php") ?><!-- Modal editar materia-->
                    <?= $this->include("Materia/asignar.blade.php") ?><!-- Modal editar materia-->
                    <?= $this->include("Materia/confirmar.blade.php") ?><!-- Modal confirmar editar materia-->      
                    <!--******** include de Oficios ********-->   
                    <?= $this->include("Oficio/crear.blade.php") ?><!-- Modal crear oficio-->     
                    <?= $this->include("Oficio/eliminar.blade.php") ?><!-- Modal eliminar oficio-->    
                    <?= $this->include("Oficio/editar.blade.php") ?><!-- Modal editar oficio-->  
                    <!--******** include de Parentesco ********-->  
                    <?= $this->include("Parentesco/crear.blade.php") ?><!-- Modal crear Parentesco-->
                    <?= $this->include("Parentesco/eliminar.blade.php") ?><!-- Modal eliminar Parentesco-->    
                    <?= $this->include("Parentesco/editar.blade.php")?> <!-- Modal editar Parentesco-->  
                    <!--******** include de Grado ********-->  
                    <?= $this->include("Grado/crear.blade.php") ?><!-- Modal agregar Grado-->
                    <?= $this->include("Grado/editar.blade.php") ?><!-- Modal editar Grado-->
                    <?= $this->include("Grado/eliminar.blade.php") ?><!-- Modal eliminar Grado-->
                    <?= $this->include("Grado/mostrar_asignaturas.blade.php") ?><!-- Modal mostrar asignaturas de grados-->
                    <!--******** include de Grupo ********--> 
                    <?= $this->include("Grupo/crear.blade.php") ?><!-- Modal crear grupo-->
                    <?= $this->include("Grupo/editar.blade.php") ?><!-- Modal editar grupo-->
                    <?= $this->include("Grupo/eliminar.blade.php") ?> <!--Modal eliminar Grupo-->
                    <!--******** include de Seccion ********-->  
                    <?= $this->include("Seccion/crear.blade.php") ?><!-- Modal crear seccion-->
                    <?= $this->include("Seccion/editar.blade.php") ?><!-- Modal editar seccion-->
                    <?= $this->include("Seccion/eliminar.blade.php") ?><!-- Modal eliminar Seccion-->
                    <!--******** include de Turno ********-->  
                    <?= $this->include("Turno/eliminar.blade.php") ?><!-- Modal eliminar Turno-->
                    <?= $this->include("Turno/editar.blade.php") ?><!-- Modal editar Turno-->
                    <?= $this->include("Turno/crear.blade.php") ?><!-- Modal crear Turno-->
                    <!--******** include de usuario ********-->   
                    <?= $this->include("Usuario/crear.blade.php") ?><!-- Modal crear usuario-->
                    <?= $this->include("Usuario/perfil.blade.php") ?><!-- Modal perfil de usuario-->
                    <!--******** include de Generales ********-->   
                    <?= $this->include("Alertas/exito.blade.php") ?><!-- Modal mensaje "Exito" -->
                    <?= $this->include("Alertas/error.blade.php") ?><!-- Modal mensaje "errores" -->                     
                    </div>
            <!--inicio footer -->
            <div>
            <?= $this->include("theme/lte/footer.blade.php") ?><!-- footer de la pagina inicio-->
            </div>        
            <!--fin footer -->  
       <?= $this->include("theme/lte/Scripts.blade.php") ?><!-- scripts de la pagina inicio y demas-->
<!--Validacion para verificar si es docente o no-->
 <!--       <script>
        if("<?php      
                      //  $session = \Config\Services::session();    // uso de varibles de session
                      //  $session->start();
                       // echo $_SESSION['Descripcion'];
        ?>"=="Docente")
        {
        $("#menu_usuarios").addClass('hidden');
        $("#menu_Matriculas").addClass('hidden');
        $("#menu_Estudiantes").addClass('hidden');
        $("#menu_Docentes").addClass('hidden');
        $("#menu_Administra").addClass('hidden');
        $("#menu_Reportes").addClass('hidden');
        }    
        </script> -->
      </body>
</html>


