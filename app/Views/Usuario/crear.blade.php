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
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email"  id="Nombre-de-usuario" class="form-control" placeholder="Nombre de usuario">
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" id="contraseña" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" id="cedula" class="form-control" placeholder="Cedula">
                            </div>
                            <div class="form-group has-feedback">
                                <select  style="color: blue; width: 100%; padding-top: 2.5%;" >
                                </select>  
                            </div>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input placeholder="Fecha vencimiento" type="text" class="form-control pull-right" id="datepicker">
                            </div>    
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
