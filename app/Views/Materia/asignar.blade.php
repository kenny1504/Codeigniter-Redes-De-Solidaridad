<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="asignar_materia"  >
    <div class="modal  modal-info fade"  id="asignar_asignatura" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Asignar Materia</h4>
                  </div>
                  <div class="modal-body ">
                    <div class="form-group">
                        <br>
                        <label for="Nombre" class="col-sm-2 control-label requerido">Asignatura </label>                
                        <div class="col-sm-10">                      
                       <select  style="color: blue; width: 80%; padding-top: 1.5%;"  name="Asignaturas" id="Asignaturas" >
                      </select> </div>
                      <div class="form-group">
                       <br> <br>
                       </div> 
                       <label for="Nombre"  style="padding-right:14%;" class="col-sm-2 control-label requerido">Grado</label>   
                       <div class="col-sm-10">                 
                       <select  style="color: blue; width: 80%; padding-top: 1.5%;" name="Grados" id="Grados" >
                       </select>                   
                        </div>
                        </div>
                        <br><br><br>
                  </div>
                  <div class="modal-footer">
                    <button type="reset" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline"  data-toggle="modal" data-target="#asignar_materia_confirmar" >Guardar</button>          
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
    </div>
</form>
