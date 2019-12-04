<!--form para poder activar la ruta y poder editar el registro--><!-- -->
<form id="editar-oferta"  >
        <div class="modal  modal-info fade"  id="editar_Oferta" >
                  <div class="modal-dialog" >
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar Oferta</h4>
                      </div>
                      <div class="modal-body ">
                            <div class="register-box-body" style="background-color:#eee;" >
                                <div class="form-group has-feedback">
                                    <input type="text" name="idoferta" id="idoferta" class="hidden">
                                    <input type="text" class="form-control" name="Descripcion_Oferta1" id="Descripcion_Oferta1"  required autocomplete="off" > <!-- captura la descripcion oferta -->
                                </div>
                                <div class="form-group input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="datepickerOfertaEditar" id="datepickerOfertaEditar">
                                    
                                </div> 
                                <label for="Nombre"  style="padding-right:14%;" class="col-sm-2 control-label requerido">Grado</label>   
                                <div class="form-group ">                 
                                    <select  style="color: black; width: 80%; padding-top: 1.5%;" name="Grado1" id="Grado1" >
                                    </select>                   
                                </div>
                                <label for="Nombre"  style="padding-right:14%;" class="col-sm-2 control-label requerido">Grupo</label>   
                                <div class="form-group ">                 
                                    <select  style="color: black; width: 80%; padding-top: 1.5%;" name="Grupo1" id="Grupo1" >
                                    </select>                   
                                </div>
                                <label for="Nombre"   class="col-sm-2 control-label requerido">Seccion</label>   
                                <div class="form-group">                 
                                    <select  style="color: black; width: 80%; padding-top: 1.5%;" name="Seccion1" id="Seccion1" >
                                    </select>                   
                                </div>
                                <label for="Nombre"   class="col-sm-2 control-label requerido">Docente</label>   
                                <div class="form-group">                 
                                    <select  style="color: black; width: 80%; padding-top: 1.5%;" name="Docente1" id="Docente1" >
                                    </select>                   
                                </div>                               
                            </div>  
                        </div>
                    <div class="modal-footer">
                        <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="button"  class="btn btn-outline" id="editar_confirmar_Oferta" >Guardar</button>          
                    </div>
                    <!-- /.modal-content -->
                  
                  <!-- /.modal-dialog -->
                  </div>        
                </div>
                </div>
    </form>