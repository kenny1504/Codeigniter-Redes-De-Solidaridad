<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<!--agrega titulo a la pagina-->
<?=  $this -> section ( 'titulo' )  ?> 
Oficios
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->         
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Oficios</h2>
              <a href="#" data-toggle="modal" data-target="#modal_Oficio" class="btn btn-warning btn-sm pull-right" id="m2">Agregar oficios</a>
            </div><!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="oficios" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Oficios</th>
                         <th></th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($oficios as $oficio): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->			
                                 <tr id="<?php echo $oficio['id']; ?>" >  <!--abre fila-->
                                    <td><?php echo $oficio['Nombre'];?></td>  <!--agrega dato a la columna-->
                                <td style="padding-top:0.1%; padding-bottom:0.1%;">
                                <button class="btn btn-success" onclick="editar_Oficio(this);" data-id="<?php echo $oficio['id']; ?>" data-Nombre="<?php echo $oficio['Nombre'];?>" ><i class=" fa fa-fw fa-pencil"></i></button>  <!--botton para editar -->
                                <button class="btn btn-info" onclick='eliminar_oficio(this);' data-id="<?php echo $oficio['id']; ?>" data-Nombre="<?php echo $oficio['Nombre'];?>" ><i class="fa fa-fw fa-trash "></i></button>  <!--botton para eliminar-->                                   
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