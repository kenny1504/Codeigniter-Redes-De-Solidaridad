<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<?=  $this -> section ( 'titulo' )  ?> 
Notas
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->        
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Notas</h2>
              <div class="box-tools" id="filtros"> 
                <div class="form-group has-feedback ">
                                        <small>Año</small>
                                        <input  minlength="4" style="width: 30%; padding-top: 1.3%;" value="<?php echo date("Y") ?>" type="number" name="telefono" id="telefono" >
                                        <select aria-required="true" required style="width: 25%; padding-top: 2.7%; " name="grupo_nota" id="grupo_nota" > 
                                        </select>
                                        <select aria-required="true" required style="width: 25%; padding-top: 2.7%; " name="grado_nota" id="grado_nota" >
                                        </select>     
                                        <button id="buscar_Notas" style="padding-top: 2.7%;" ><i class="fa fa-search"></i></button>         
                                        
                </div>  
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body panel box box-primary">
              <table id="estudiantes" class="table table-bordered table-striped">
                     <thead>  <!--Header de la tabla -->  
                       <tr > 
                         <th>Codigo estudiante</th>
                         <th>Nombre completo</th>
                         <th>Sexo</th>
                         <th>Grado</th>
                         <th>Grupo</th>
                         <th>Nota</th>
                       </tr>
                    </thead> 
                        <tbody> <!--Cuerpo de la tabla --> 
                        </tbody>                        
              </table>   
            </div>
            <tfoot>
            <a href="#" onclick="" class="btn btn-warning btn-sm pull-right" id="guardar_notas" >Guardar</a>
            </tfoot>
            <div class="panel box box-primary"></div><!-- /.box-body -->
          </div>  
          

<style>
    /* Codigo para aplicar placeholder a combobox */
    option[value=""][disabled]
    {
        display: none;
    }
    .register-box-body{
       color:gray !important;
    }
</style>

<?=  $this -> endSection () ?> 