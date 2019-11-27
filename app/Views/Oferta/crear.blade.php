<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="ingresar_oferta"  >
    <div class="modal  modal-info fade"  id="crear_oferta" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Oferta</h4>
                  </div>
                  <div class="modal-body ">
                        <div class="register-box-body" style="background-color:#eee;" >
                            <div class="form-group has-feedback">
                                <input type="text" id="Descripcion-Oferta" class="form-control" placeholder="Descripcion de Oferta">
                            </div>
                            <div class="form-group input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input placeholder="Fecha Oferta" type="text" class="form-control pull-right" id="datepicker">
                            </div> 
                            <label for="Nombre"   class="col-sm-2 control-label requerido">Seccion</label>   
                            <div class="form-group">                 
                                <select  style="color: black; width: 80%; padding-top: 1.5%;" name="Seccion" id="Seccion" >
                                </select>                   
                            </div>
                            <label for="Nombre"  style="padding-right:14%;" class="col-sm-2 control-label requerido">Grado</label>   
                            <div class="form-group ">                 
                                <select  style="color: black; width: 80%; padding-top: 1.5%;" name="Grado" id="Grado" >
                                </select>                   
                            </div>
                            <label for="Nombre"  style="padding-right:14%;" class="col-sm-2 control-label requerido">Grupo</label>   
                            <div class="form-group ">                 
                                <select  style="color: black; width: 80%; padding-top: 1.5%;" name="Grupo" id="Grupo" >
                                </select>                   
                            </div>
                            <label for="Nombre"   class="col-sm-2 control-label requerido">Docente</label>   
                            <div class="form-group">                 
                                <select  style="color: black; width: 80%; padding-top: 1.5%;" name="Docente" id="Docente" >
                                </select>                   
                            </div>                               
                        </div>  
                <div class="modal-footer">
                    <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button"  class="btn btn-outline"  >Guardar</button>          
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>        
            </div>
            </div>
</form>