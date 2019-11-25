<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<!--agrega titulo a la pagina-->
<?=  $this -> section ( 'titulo' )  ?> 
Grupos
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->     
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Grupos</h2>
              <a href="#" data-toggle="modal" data-target="#modal_Grupo" class="btn btn-warning btn-sm pull-right" id="m2">Agregar grupo</a>
            </div> <!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="grupos" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Lista</th>
                         <th></th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($grupos as $grupo): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->						
                                 <tr id="<?php echo $grupo['id']; ?>" >  <!--abre fila-->
                                    <td><?php echo $grupo['Grupo'];?></td>  <!--agrega dato a la columna-->
                                <td>
                                <button class="btn btn-success " onclick="editar_Grupo(this);" data-id="<?php echo $grupo['id']; ?>" data-Nombre="<?php echo $grupo['Grupo'];?>" ><i class=" fa fa-fw fa-pencil"></i></button>  <!--botton para editar -->
                                <button class="btn btn-info" onclick='eliminar_grupo(this);' data-id2="<?php echo $grupo['id']; ?>" data-Nombre="<?php echo $grupo['Grupo'];?>" ><i class="fa fa-fw fa-trash "></i></button>  <!--botton para eliminar-->                                   
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