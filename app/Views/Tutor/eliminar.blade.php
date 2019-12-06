<!-- Modal para Eliminar Tutor-->
<form  id="delete_tutor" >
    <div id="eliminar_Tutor" class=" modal modal-danger fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title icon fa fa-check">Desea Eliminar El Tutor Selecionada?</h4>
            </div> 
            <div class="modal-footer">
              <input type="text" class="hidden" id="valor_id_tutor" name="valor_id_tutor" > <!-- captura el valor del id del tutor -->
              <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirmar_eliminar_tutor" >
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