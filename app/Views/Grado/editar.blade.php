<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="editar-grado" >
    <div class="modal  modal-info fade" id="editar_Grado" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Grado</h4>
                  </div>
                  <div class="modal-body ">
                    <div class="form-group">
                        <br>
                        <label for="Grupo" class="col-sm-2 control-label requerido">Grado</label>                
                        <div class="col-sm-10">
                        <input type="text" class="hidden" id="idgrado" name="idgrado" > <!-- captura el valor del id del grado -->
                        <input type="text" class="form-control" name="Nombre-Grado" id="Nombre-Grado"  required autocomplete="off" onkeypress="Ingresar_grado(event)" > <!-- captura el nombre del grado -->
                          <p class="error text-red hidden">error: </p> <!-- todo error es mostrado aqui -->
                        </div>
                        <br><br>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="reset" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button"  class="btn btn-outline" id="editar_confirmar_Grado"  >Guardar</button>          
                  </div>
                </div> <!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
</div>
  </form>