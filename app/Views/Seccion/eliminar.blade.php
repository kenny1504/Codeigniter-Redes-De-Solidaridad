<!-- Modal para eliminar Seccion-->
<form  id="delete_seccion" >
  <div id="eliminar_Seccion" class=" modal modal-danger fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title icon fa fa-check">Confirme Si Desea Eliminar La Seccion?</h4>
          </div>
         
          <div class="modal-footer">
            <input type="text" class="hidden" id="valor_id_seccion" name="valor_id_seccion" > <!-- captura el valor del id de la seccion -->
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirmar_eliminar_seccion">
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