<?= $this->extend("theme/lte/layout.blade.php") ?><!--extiendo del layout "pagina inicio" -->
<?=  $this -> section ( 'titulo' )  ?> 
Notas
<?=  $this -> endSection () ?> 
<?=  $this -> section ( 'contenido' )  ?>   <!--agrega codigo a la seccion contenido del layout-->        
            <div class="box">
            <div class="box-header">
              <h2 class="box-title text-light-blue">Notas</h2>
              <div class="box-tools" id="filtros">
                <div class="form-group ">
                                        <input style="width: 20%; padding-top: 1.5%; " name="año_oferta" type="text" class="form-control pull-left requerido" id="año_oferta" required placeholder="Año">
                                        <select aria-required="true" required style="width: 15%; padding-top: 2.3%; " name="grado_nota" id="grado_nota" >
                                        </select>   
                                        <select aria-required="true" required style="width: 15%; padding-top: 2.3%; " name="grupo_nota" id="grupo_nota" > 
                                        </select>
                                        </select>
                                        <select aria-required="true" required style="width: 15%; padding-top: 2.3%; " name="Detalle_nota" id="Detalle_nota" >
                                        </select>  
                                        </select>
                                        <select aria-required="true" required style="width: 15%; padding-top: 2.3%; " name="materias_nota" id="materias_nota" >
                                        </select>  
                                        <a type="submit" style="width: 10%; padding-top: 1.4%; " onclick="Mostar_Notas();" class="btn btn-primary btn-sm pull-right" id="guardar_notas" ><i class="fa fa-search"></i></a>
                                        
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
                         <th>Materia</th>
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