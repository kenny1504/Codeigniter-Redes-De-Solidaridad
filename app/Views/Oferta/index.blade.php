<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<?=  $this -> section ( 'titulo' )  ?> 
Ofertas
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->        
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Ofertas Academicas</h2>
              <div class="pull-right box-tools">
                <a href="#" data-toggle="modal" data-target="#crear_oferta" id="cargar2" class="btn btn-warning btn-sm pull-right" >Agregar Oferta</a> 
                <div class="input-group input-group-sm hidden-xs" style="width: 350px;">
                
                  <div class="input-group-btn">
                   
                  </div>
                </div>  
              </div>     
            </div>
            <!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="ofertas" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Descripcion</th>
                         <th>Año de Oferta</th>
                         <th>Docente</th>                       
                         <th>Grado</th>
                         <th>Grupo</th>
                         <th>Seccion</th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        <?php foreach ($ofertas ->getResultArray() as $oferta): ?><!--ciclo que recorre el arreglo retonrnado del controlador-->					
                                 <tr id="<?php echo $oferta['id']; ?>" >  <!--abre fila-->                              
                                    <td><?php echo $oferta['Descripcion'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $oferta['FechaOferta'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $oferta['Nombre_Docente'];?></td>  <!--agrega dato a la columna--> 
                                    <td><?php echo $oferta['Grado'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $oferta['Grupo'];?></td>  <!--agrega dato a la columna-->
                                    <td><?php echo $oferta['Codigo'];?></td>  <!--agrega dato a la columna-->
                                <td style="padding-top:0.1%; padding-bottom:0.1%;">
            <!-- Boton Nuevo--> 
               <button class="btn btn-success " onclick="editar_Oferta(this);" data-id="<?php echo $oferta['id']; ?>" data-Nombre="<?php echo $oferta['Descripcion'];?>" ><i class=" fa fa-fw fa-pencil"></i></button>  <!--botton para editar -->
               <button class="btn btn-info"  onclick='eliminar_oferta(this);'  data-id="<?php echo $oferta['id']; ?>" data-Nombre="<?php echo $oferta['Descripcion'];?>" ><i class="fa fa-fw fa-trash "></i></button>  <!--botton para eliminar-->                            
               
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