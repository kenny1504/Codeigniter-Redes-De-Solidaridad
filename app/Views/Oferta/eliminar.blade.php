<!-- Modal para eliminar Oferta-->
<form  id="delete_oferta" >
    <div id="eliminar_Oferta" class=" modal modal-danger fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title icon fa fa-check">Confirme Si Desea Eliminar La Oferta Selecionada?</h4>
            </div> 
            <div class="modal-footer">
              <input type="text" class="hidden" id="valor_id_oferta" name="valor_id_oferta" > <!-- captura el valor del id de la oferta -->
              <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirmar_eliminar_oferta" >
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