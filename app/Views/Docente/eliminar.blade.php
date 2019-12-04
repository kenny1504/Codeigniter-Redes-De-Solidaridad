<!-- Modal para Deshabilitar Docente-->
<form  id="delete_docente" >
    <div id="eliminar_Docente" class=" modal modal-danger fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title icon fa fa-check">Desea Deshabilitar El Docente Selecionada?</h4>
            </div> 
            <div class="modal-footer">
              <input type="text" class="hidden" id="valor_id_docente" name="valor_id_docente" > <!-- captura el valor del id del docente -->
              <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirmar_eliminar_docente" >
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