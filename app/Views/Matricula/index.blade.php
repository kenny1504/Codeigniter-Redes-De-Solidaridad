<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<?=  $this -> section ( 'titulo' )  ?> 
Matricula
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout--> 
<div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Estudiantes</h2>
              <div class="pull-right box-tools"> 
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
              <table id="estudiantes_matricula" class="table table-bordered table-striped">
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
                                                <button class="btn btn-primary " onclick="ingresar_matricula(this);"  data-id="<?php echo $Estudiante['id']; ?>" id="Ver-matricula">Matricular</button>
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
<style>
.oculta {
        display: none;
    }

    .muestra{
        display: table-row;
    }
</style>
<?=  $this -> endSection () ?> 


