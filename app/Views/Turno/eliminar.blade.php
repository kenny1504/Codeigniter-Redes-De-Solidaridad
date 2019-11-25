<!-- Modal para eliminar turno-->
<form  id="delete_turno" >
    <div id="eliminar_Turno" class=" modal modal-danger fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title icon fa fa-check">Desea Eliminar El Turno?</h4>
            </div>
           
            <div class="modal-footer">
              <input type="text" class="hidden" id="valor_id_turno" name="valor_id_turno" > <!-- captura el valor del id del turno -->
              <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirmar_eliminar_turno">
                <span  class="icon fa fa-check " ></span>
              </button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class="glyphicon glyphicon"></span>close
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>