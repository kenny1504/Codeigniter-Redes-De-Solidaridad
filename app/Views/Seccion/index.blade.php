<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<!--agrega titulo a la pagina-->
<?=  $this -> section ( 'titulo' )  ?> 
Secciones
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->      
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Secciones</h2>
              <a href="#" data-toggle="modal" data-target="#modal_Seccion" class="btn btn-warning btn-sm pull-right" id="m2">Agregar Secciones</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="secciones" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Lista de Secciones</th>
                         <th></th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($secciones as $seccion): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->
						
                                 <tr id="<?php echo $seccion['id']; ?>" >  <!--abre fila-->
                                    <td><?php echo $seccion['Codigo'];?></td>  <!--agrega dato a la columna-->
                                <td>
                                <button class="btn btn-success " onclick="editar_Seccion(this);" data-id="<?php echo $seccion['id']; ?>" data-Nombre="<?php echo $seccion['Codigo'];?>" ><i class=" fa fa-fw fa-pencil"></i></button>  <!--botton para editar -->
                                <button class="btn btn-info" onclick='eliminar_seccion(this);' data-id="<?php echo $seccion['id']; ?>" data-Nombre="<?php echo $seccion['Codigo'];?>" ><i class="fa fa-fw fa-trash "></i></button>  <!--botton para eliminar-->                                   
                                </td>
                                </tr>
                        
						              <?php endforeach; ?>
                        </tbody>                        
              </table>
              <?= $pager->links() ?> <!--Paginacion-->
            </div>
            <div class="panel box box-primary"></div> <!-- /.box-body -->
          </div>  
<?=  $this -> endSection () ?> 