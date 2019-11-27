<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<!--agrega titulo a la pagina-->
<?=  $this -> section ( 'titulo' )  ?> 
Turnos
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->        
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Turnos</h2>
              <a href="#" data-toggle="modal" data-target="#modal_Turno" class="btn btn-warning btn-sm pull-right" id="m2">Agregar Turnos</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="turnos" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Lista de Turnos</th>
                         <th></th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($turnos as $turno): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->					
                                 <tr id="<?php echo $turno['id']; ?>" >  <!--abre fila-->
                                    <td><?php echo $turno['Nombre'];?></td>  <!--agrega dato a la columna-->
                                <td style="padding-top:0.1%; padding-bottom:0.1%;">
                                <button class="btn btn-success " onclick="editar_Turno(this);" data-id="<?php echo $turno['id']; ?>" data-Nombre="<?php echo $turno['Nombre'];?>" ><i class=" fa fa-fw fa-pencil"></i></button>  <!--botton para editar -->
                                <button class="btn btn-info" onclick='eliminar_turno(this);' data-id="<?php echo $turno['id']; ?>" data-Nombre="<?php echo $turno['Nombre'];?>" ><i class="fa fa-fw fa-trash "></i></button>  <!--botton para eliminar-->                                   
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