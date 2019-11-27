<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<!--agrega titulo a la pagina-->
<?=  $this -> section ( 'titulo' )  ?> 
Grados
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->         
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Grados</h2>
              <a href="#" data-toggle="modal" data-target="#modal_Grado" class="btn btn-warning btn-sm pull-right" id="m2">Agregar Grado</a>
            </div><!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="grados" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Grados Academicos</th>
                         <th></th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($grados as $grado): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->				
                                 <tr id="<?php echo $grado['id']; ?>" >  <!--abre fila-->
                                    <td><?php echo $grado['Grado'];?></td>  <!--agrega dato a la columna-->
                                <td style="padding-top:0.1%; padding-bottom:0.1%;">
            <!-- Boton Nuevo--> <button class="btn btn-primary" onclick='mostrar_Materias_grados(this)' data-id="<?php echo $grado['id']; ?>" data-Nombre="<?php echo $grado['Grado'];?>" id="Ver-Asignaturas">ver</button>  <!--botton para ver ** Sirve para ver materias asignadas a este grado** -->     
                                <button class="btn btn-success " onclick="editar_Grado(this);" data-id="<?php echo $grado['id']; ?>" data-Nombre="<?php echo $grado['Grado'];?>" ><i class=" fa fa-fw fa-pencil"></i></button>  <!--botton para editar -->
                                <button class="btn btn-info" onclick='eliminar_grado(this);' data-id="<?php echo $grado['id']; ?>" data-Nombre="<?php echo $grado['Grado'];?>" ><i class="fa fa-fw fa-trash "></i></button>  <!--botton para eliminar-->                            
                                </td>
                                </tr>                        
						              <?php endforeach; ?>
                        </tbody>                        
              </table>
              <?= $pager->links() ?> <!--Paginacion-->
            </div>
            <div class="panel box box-primary"></div><!-- /.box-body -->
          </div>  
<?=  $this -> endSection () ?> 