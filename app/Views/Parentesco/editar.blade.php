<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="editar-parentesco" >
  <div class="modal  modal-info fade" id="editar_Parentesco" >
            <div class="modal-dialog" >
              <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Editar Parentesco</h4>
                </div>
                <div class="modal-body ">
                  <div class="form-group">
                      <br>
                      <label for="Parentesco" class="col-sm-2 control-label requerido">parentesco</label>                
                      <div class="col-sm-10">
                      <input type="text" class="hidden" id="idparentesco" name="idparentesco" > <!-- captura el valor del id del parentesco -->
                      <input type="text" class="form-control" name="Nombre-Parentesco" id="Nombre-Parentesco"  required autocomplete="off" onkeypress="Ingresar_parent(event)" > <!-- captura el nombre del parentesco -->
                        <p class="error text-red hidden">error: </p> <!-- todo error es mostrado aqui -->
                      </div>
                      <br><br>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="reset" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                  <button type="button"  class="btn btn-outline" id="editar_confirmar_Parentesco"  >Guardar</button>          
                </div>
              </div>
              <!-- /.modal-content -->
            </div><!-- /.modal-dialog -->         
  </div>
</form>