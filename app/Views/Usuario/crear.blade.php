<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="ingresar_usuario"  >
    <div class="modal  modal-info fade"  id="crear_usuario" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ingresar Usario</h4>
                  </div>
                  <div class="modal-body ">
                        <div class="register-box-body" style="background-color:#eee;" >
                            <div class="form-group has-feedback">
                                <input type="text" id="Nombre-completo" class="form-control" placeholder="Nombre Completo">
                                <small id="nombreu" class="hidden" >Nombre Completo</small>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email"  id="Nombre-de-usuario" class="form-control" placeholder="Nombre de usuario">
                                <small id="nombreuser" class="hidden" >Nombre usuario</small>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" id="contraseña" class="form-control" placeholder="Contraseña">
                                <small id="contraseñau" class="hidden" >Contraseña</small>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" id="cedula" class="form-control" placeholder="Cedula">
                                <small id="cedulau" class="hidden" >Cedula</small>
                            </div>
                            <div class="form-group has-feedback">
                                <select  style="width: 100%; padding-top: 2.5%; " name="roles" id="roles" >
                                </select>  
                                <small id="rolau" class="hidden" >Rol</small>
                            </div>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input placeholder="Fecha vencimiento" type="text" class="form-control pull-right" id="datepicker">            
                            </div> 
                            <small id="vencimientou" class="hidden" >vendimiento</small>   
                        </div>  
                <div class="modal-footer">
                    <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="return ValidarCedula(cedula.value);" class="btn btn-outline"  >Guardar</button>          
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>        
            </div>
            </div>
</form>
