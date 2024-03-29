<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<?=  $this -> section ( 'titulo' )  ?> 
Estudiantes
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->  

<style>
    .btn-default{
        
    border-color: #075f75;
    }
    .btn-primary {
    background-color: #3c8dbc;
    border-color: #367fa9;
    color: white;
    border-color: white;
    }

    .stepwizard-step p {
        margin-top: 10px;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 2.5px;
        background-color: #075f75;
        z-order: 0;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
    
    .oculta {
        display: none;
    }

    .muestra{
        display: table-row;
    }
</style>
<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-6">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Estudiantes</p>
            </div>
            <div class="stepwizard-step col-xs-6">
                <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                <p>Tutores</p>
            </div>
        </div>
    </div>
</div>  
<div class="box setup-content" id="step-1">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Estudiantes</h2>
              <div class="pull-right box-tools">
                <a href="#" onclick="ingresar_estudiante();" class="btn btn-warning btn-sm pull-right b1" >Agregar Estudiante</a> 
                <div class="input-group input-group-sm hidden-xs" style="width: 350px;">
                <input type="text" id="buscarE"  name="table_search" class="form-control " placeholder="Buscar Nombre o codigo">
                  <div class="input-group-btn">
                    <span style="margin-right:2em;"  class="btn btn-default"><i class="fa fa-search"></i></span>
                  </div>
                </div>
              </div>      
            </div>
            <!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="estudiantes" class="table table-bordered table-striped display">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Codigo estudiante</th>
                         <th>Nombre completo</th>
                         <th>Sexo</th>
                         <th>Direccion</th>
                         <th>Tutor</th>
                         <th>Tutor Telefono</th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($Estudiantes ->getResultArray() as $Estudiante): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->					
                                 <tr >  <!--abre fila-->                              
                                    <td><?php echo $Estudiante['CodigoEstudiante'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $Estudiante['Nombre'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $Estudiante['Sexo'];?></td>  <!--agrega dato a la columna--> 
                                    <td><?php echo $Estudiante['Direccion'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $Estudiante['Nombre_tutor'];?>  <!--inicio columna que contienen botones-->
                                    <td style="padding-top:0.1%; padding-bottom:0.1%;"class="hidden" id="<?php echo $Estudiante['id']; ?>" > 
                                                <button class="btn btn-primary"  onclick="ver_estudiante(this);"  data-id="<?php echo $Estudiante['id']; ?>" id="Ver-estudiante">ver</button>      
                                                <button class="btn btn-success " data-id="<?php echo $Estudiante['id']; ?>" data-idper="<?php echo $Estudiante['personasid']; ?>"  onclick="editar_estudiante(this);" ><i class=" fa fa-fw fa-pencil"></i></button> 
                                                <button class="btn btn-info" data-id="<?php echo $Estudiante['id']; ?>" onclick="eliminar_estudiante(this);"><i class="fa fa-fw fa-trash "></i></button>
                                                <i class="fa fa-angle-double-right pull-right" onclick="mostrar(this);" data-id="<?php echo $Estudiante['id']; ?>"></i>                             
                                    </td>
                                    </td>  <!--fin columna botones-->
                                    <td id="<?php echo $Estudiante['id']; ?>a" ><?php echo $Estudiante['Telefono'];?> <i class="fa fa-angle-double-right pull-right" onclick="mostrar(this);"  data-id="<?php echo $Estudiante['id']; ?>"></i> </td>  <!--agrega dato a la columna-->
                               
                                </tr>                         
						              <?php endforeach; ?> 
                        </tbody>                        
              </table>   
            </div>
            <div class="panel box box-primary"></div><!-- /.box-body -->
          </div>
    <div class="box setup-content" id="step-2"> <!-- Datos Tutores -->
         <div class="box-header">
            <h2 class="box-title text-light-blue">Tutores</h2>
            <div class="pull-right box-tools"> 
                <a href="#" onclick="ingresar_tutor();" class="btn btn-warning btn-sm pull-right b1" >Agregar Tutor</a>
              <div class="input-group input-group-sm hidden-xs" style="width: 350px;">
              <input type="text" id="buscarT"  name="table_search" class="form-control " placeholder="Buscar Nombre o cedula">
                <div class="input-group-btn">
                  <span style="margin-right:2em;"  class="btn btn-default"><i class="fa fa-search"></i></span>
                </div>
              </div>  
            </div>     
          </div>
          <!-- /.box-header -->
          <div class="box-body panel box box-primary">
            <table id="tutor" class="table table-bordered table-striped">
                   <thead>  <!--Header de la tabla -->  
                     <tr > 
                       <th>Cedula</th>
                       <th>Nombre completo</th>
                       <th>Sexo</th>
                       <th>Correo</th>
                       <th>Oficio</th>
                       <th>Telefono</th>
                     </tr>
                  </thead> 
                      <tbody> <!--Cuerpo de la tabla --> 
                      <?php foreach ($Tutores ->getResultArray() as $Tutor): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->					
                               <tr >  <!--abre fila-->                              
                                  <td><?php echo $Tutor['Cedula'];?></td>  <!--agrega dato a la columna-->
                                  <td><?php echo $Tutor['Nombre'];?></td>  <!--agrega dato a la columna-->
                                  <td><?php echo $Tutor['Sexo'];?></td>  <!--agrega dato a la columna--> 
                                  <td><?php echo $Tutor['Correo'];?></td>  <!--agrega dato a la columna-->
                                  <td><?php echo $Tutor['Oficio'];?>  <!--inicio columna que contienen botones-->
                                    <td style="padding-top:0.1%; padding-bottom:0.1%;"class="hidden" id="<?php echo $Tutor['id']; ?>T" >
                                        <button class="btn btn-primary "  onclick="ver_tutor(this);"  data-id="<?php echo $Tutor['id']; ?>" id="Ver-tutor">ver</button>      
                                        <button class="btn btn-success " onclick="editar_Tutor(this);" data-id="<?php echo $Tutor['id']; ?>"><i class=" fa fa-fw fa-pencil"></i></button> 
                                        <button class="btn btn-info" onclick="eliminar_tutor(this);" data-id="<?php echo $Tutor['id']; ?>"><i class="fa fa-fw fa-trash "></i></button>
                                        <i class="fa fa-angle-double-right pull-right "onclick="mostrarT(this);" data-id="<?php echo $Tutor['id']; ?>"></i>                             
                            </td>
                            </td>  <!--fin columna botones-->
                                  <td id="<?php echo $Tutor['id']; ?>T2" ><?php echo $Tutor['Telefono'];?> <i class="fa fa-angle-double-right pull-right" onclick="mostrarT(this);"  data-id="<?php echo $Tutor['id']; ?>"></i> </td>  <!--agrega dato a la columna-->
                                    
                              </tr>                         
                                    <?php endforeach; ?> 
                      </tbody>                        
            </table>   
          </div>
          <div class="panel box box-primary"></div><!-- /.box-body -->
     </div>  
<?=  $this -> endSection () ?> 