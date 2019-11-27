<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<?=  $this -> section ( 'titulo' )  ?> 
Usuarios
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->        
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Usuarios</h2>
              <div class="pull-right box-tools">
                <a href="#" onclick="ingresar_usuario();" class="btn btn-warning btn-sm pull-right b1" >Agregar Usario</a> 
                <div class="input-group input-group-sm hidden-xs" style="width: 350px;">
                <input type="text" id="buscarU"  name="table_search" class="form-control " placeholder="Buscar">
                  <div class="input-group-btn">
                    <span style="margin-right:2em;"  class="btn btn-default"><i class="fa fa-search"></i></span>
                  </div>
                </div>  
              </div>     
            </div>
            <!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="usuarios" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Nombre</th>
                         <th>Nombre de usuario</th>
                         <th>Clave de usuario</th>
                         <th>Vencimiento</th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($usuarios ->getResultArray() as $usuario): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->					
                                 <tr id="<?php echo $usuario['Id_Usuarios']; ?>" >  <!--abre fila-->                              
                                    <td><?php echo $usuario['Nombre'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $usuario['NombreDeUsuario'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $usuario['ClaveDeUsuario'];?></td>  <!--agrega dato a la columna--> 
                                    <td><?php echo $usuario['FechaDeVencimiento'];?></td>  <!--agrega dato a la columna-->
                                <td style="padding-top:0.1%; padding-bottom:0.1%;">
            <!-- Boton ver-->  <button class="btn btn-primary"  onclick="ver_usuario(this);" data-cedula="<?php echo $usuario['Cedula']; ?>" data-Nombre="<?php echo $usuario['Nombre'];?>" 
                                 data-user="<?php echo $usuario['NombreDeUsuario'];?>" data-rol="<?php echo $usuario['Descripcion'];?>" 
                                 data-password="<?php echo $usuario['ClaveDeUsuario'];?>" data-vencimiento="<?php echo $usuario['FechaDeVencimiento'];?>" id="Ver-Usuario">ver</button>  <!--botton para ver ** Sirve para ver materias asignadas a este grado** -->     
            <!-- Boton editar-->  <button class="btn btn-success " onclick="editar_usuario(this);" data-cedula="<?php echo $usuario['Cedula']; ?>" data-Nombre="<?php echo $usuario['Nombre'];?>" 
                                 data-user="<?php echo $usuario['NombreDeUsuario'];?>" data-rol="<?php echo $usuario['Descripcion'];?>" 
                                 data-password="<?php echo $usuario['ClaveDeUsuario'];?>" data-vencimiento="<?php echo $usuario['FechaDeVencimiento'];?>"><i class=" fa fa-fw fa-pencil"></i></button>  <!--botton para editar -->
          <!-- Boton borrar--><button class="btn btn-info" onclick='' data-id="<?php echo $usuario['Id_Usuarios']; ?>" data-Nombre="<?php echo $usuario['Nombre'];?>" ><i class="fa fa-fw fa-trash "></i></button>  <!--botton para eliminar-->                            
                                </td>
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
