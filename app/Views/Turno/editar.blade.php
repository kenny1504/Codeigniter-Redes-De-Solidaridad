<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="editar-turno" >
  <div class="modal  modal-info fade" id="editar_Turno" >
            <div class="modal-dialog" >
              <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Editar Turno</h4>
                </div>
                <div class="modal-body ">
                  <div class="form-group">
                      <br>
                      <label for="Turno" class="col-sm-2 control-label requerido">turno</label>                
                      <div class="col-sm-10">
                      <input type="text" class="hidden" id="idturno" name="idturno" > <!-- captura el valor del id del turno -->
                      <input type="text" class="form-control" name="Nombre-Turno" id="Nombre-Turno"  required autocomplete="off" onkeypress="Ingresar_turn(event)" > <!-- captura el nombre del turno -->
                        <p class="error text-red hidden">error: </p> <!-- todo error es mostrado aqui -->
                      </div>
                      <br><br>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="reset" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                  <button type="button"  class="btn btn-outline" id="editar_confirmar_Turno"  >Guardar</button>          
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->         
  </div>
</form>