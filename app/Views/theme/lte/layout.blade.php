<!DOCTYPE html>
<html>
<head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="assets/lte/dist/img/logo.png">
        <title> <?=$this->renderSection('titulo')?> | Redes De Solidaridad</title> <!-- Titulo de la pagina-->
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- CSS Generales-->
         <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
        <link  rel="stylesheet" type="text/css" href="assets/lte/bower_components/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/bower_components/Ionicons/css/ionicons.min.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/dist/css/AdminLTE.min.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/dist/css/skins/_all-skins.min.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css" >
        <link rel="stylesheet" type="text/css" href="assets/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" >     
        <link rel="stylesheet" type="text/css" href="assets/lte/bower_components/vectormap/jquery-jvectormap.css">
        <link rel="stylesheet" type="text/css" href="js/js-redes/Estudiante/select2.min.css">
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
                <section class="content-header"> <!-- Seccion donde se muestran todos los datos segun los seleccionado-->
                   <?= $this->renderSection ('contenido') ?>  <!-- Contenido dinamico-->
                </section> 
                    <!--******** include de Materia ********-->                           
                    <?= $this->include("Materia/crear.blade.php") ?><!-- Modal ingresar una materia-->
                    <?= $this->include("Materia/eliminar.blade.php") ?><!-- Modal eliminar materia-->      
                    <?= $this->include("Materia/editar.blade.php") ?><!-- Modal editar materia-->
                    <?= $this->include("Materia/asignar.blade.php") ?><!-- Modal editar materia-->
                    <?= $this->include("Materia/confirmar.blade.php") ?><!-- Modal confirmar editar materia-->
                    <!--******** include de Parentesco ********-->  
                    <?= $this->include("Parentesco/crear.blade.php") ?><!-- Modal ingresar un Parentesco-->
                    <?= $this->include("Parentesco/eliminar.blade.php") ?><!-- Modal eliminar Parentesco-->    
                    <?= $this->include("Parentesco/editar.blade.php")?> <!-- Modal editar Parentesco-->  
                    <!--******** include de Grado ********-->  
                    <?= $this->include("Grado/crear.blade.php") ?><!-- Modal ingresar un Grado-->
                    <?= $this->include("Grado/editar.blade.php") ?><!-- Modal editar Grado-->
                    <?= $this->include("Grado/eliminar.blade.php") ?><!-- Modal eliminar Grado-->
                    <?= $this->include("Grado/mostrar_asignaturas.blade.php") ?><!-- Modal mostrar asignaturas de grados-->
                    <!--******** include de Grupo ********--> 
                    <?= $this->include("Grupo/crear.blade.php") ?><!-- Modal ingresar un grupo-->
                    <?= $this->include("Grupo/editar.blade.php") ?><!-- Modal editar grupo-->
                    <?= $this->include("Grupo/eliminar.blade.php") ?> <!--Modal eliminar Grupo-->
                    <!--******** include de Seccion ********-->  
                    <?= $this->include("Seccion/crear.blade.php") ?><!-- Modal ingresar un seccion-->
                    <?= $this->include("Seccion/editar.blade.php") ?><!-- Modal editar seccion-->
                    <?= $this->include("Seccion/eliminar.blade.php") ?><!-- Modal eliminar Seccion-->
                    <!--******** include de Turno ********-->  
                    <?= $this->include("Turno/eliminar.blade.php") ?><!-- Modal eliminar Turno-->
                    <?= $this->include("Turno/editar.blade.php") ?><!-- Modal editar Turno-->
                    <?= $this->include("Turno/crear.blade.php") ?><!-- Modal ingresar un Turno-->
                    <!--******** include de usuario ********-->   
                    <?= $this->include("Usuario/crear.blade.php") ?><!-- Modal ingresar un usuario-->
                    <?= $this->include("Usuario/perfil.blade.php") ?><!-- Modal perfil de usuario-->
                     <!--******** include de Ofertas ********-->  
                     <?= $this->include("Oferta/crear.blade.php") ?><!-- Modal crear oferta-->
                     <?= $this->include("Oferta/editar.blade.php") ?><!-- Modal editar oferta-->
                     <?= $this->include("Oferta/eliminar.blade.php") ?><!-- Modal eliminar Oferta-->   
                     <!--******** include de Estudiantes ********--> 
                     <?= $this->include("Estudiante/ver.blade.php") ?><!-- Modal ver estudiante-> 
                     <?= $this->include("Estudiante/crear.blade.php") ?>  <!--Modal ingresar un nuevo estudiante--> 
                     <?= $this->include("Estudiante/eliminar.blade.php") ?>  <!--Modal eliminar un estudiante--> 
                     <?= $this->include("Estudiante/editar.blade.php") ?>  <!--Modal editar un estudiante--> 
                     <!--******** include de Tutor ********--> 
                     <?= $this->include("Tutor/ver.blade.php") ?><!-- Modal ver tutor--> 
                     <?= $this->include("Tutor/crear.blade.php") ?><!-- Modal ingresar un tutor-->
                     <?= $this->include("Tutor/eliminar.blade.php") ?>  <!--Modal eliminar un tutor-->    
                     <?= $this->include("Tutor/editar.blade.php") ?><!-- Modal editar Docente-->    
                    <!--******** include de Oficios ********-->   
                    <?= $this->include("Oficio/crear.blade.php") ?><!-- Modal ingresar un oficio-->     
                    <?= $this->include("Oficio/eliminar.blade.php") ?><!-- Modal eliminar oficio-->    
                    <?= $this->include("Oficio/editar.blade.php") ?><!-- Modal editar oficio--> 
                    <!--******** include de Docente ********--> 
                    <?= $this->include("Docente/ver.blade.php") ?><!-- Modal ver Docente-> 
                    <?= $this->include("Docente/crear.blade.php") ?><!-- Modal ingresar Docente--> 
                    <?= $this->include("Docente/eliminar.blade.php") ?><!-- Modal eliminar Docente-->   
                    <?= $this->include("Docente/editar.blade.php") ?><!-- Modal editar Docente-->
                    
                    <!--******** include de Matricula ********--> 
                    <?= $this->include("Matricula/crear.blade.php") ?><!-- Modal ingresar Matricula--> 
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

      </body>
</html>


