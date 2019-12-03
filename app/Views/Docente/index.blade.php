<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<?=  $this -> section ( 'titulo' )  ?> 
Docentes
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->        
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Docentes</h2>
              <div class="pull-right box-tools">
                <a href="#" onclick="ingresar_estudiante();" class="btn btn-warning btn-sm pull-right b1" >Agregar Docente</a> 
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
              <table id="docentes" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Cedula</th>
                         <th>Nombre completo</th>
                         <th>Sexo</th>
                         <th>Correo</th>
                         <th>Telefono</th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($Docentes ->getResultArray() as $Docente): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->					
                                 <tr >  <!--abre fila-->                              
                                    <td><?php echo $Docente['Cedula'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $Docente['Nombre'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $Docente['Sexo'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $Docente['Correo'];?>  <!--inicio columna que contienen botones-->
                                    <td style="padding-top:0.1%; padding-bottom:0.1%;"class="hidden" id="<?php echo $Docente['id']; ?>" >
                                                <button class="btn btn-primary"  onclick="ver_docente(this);"  data-id="<?php echo $Docente['id']; ?>" id="Ver-docente">ver</button>      
                                                <button class="btn btn-success " onclick="" ><i class=" fa fa-fw fa-pencil"></i></button> 
                                                <button class="btn btn-info" onclick=""><i class="fa fa-fw fa-trash "></i></button>
                                                <i class="fa fa-angle-double-right pull-right mostrar1" data-id="<?php echo $Docente['id']; ?>"></i>                             
                                    </td>
                                    </td>  <!--fin columna botones-->
                                    <td id="<?php echo $Docente['id']; ?>a" ><?php echo $Docente['Telefono'];?> <i class="fa fa-angle-double-right pull-right mostrar1" data-id="<?php echo $Docente['id']; ?>"></i> </td>  <!--agrega dato a la columna-->
                               
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