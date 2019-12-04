<!--form para poder activar la ruta y poder editar el registro de docente--><!-- -->
<form id="editar_docente"  >
    <div class="modal  modal-info fade"  id="editar_Docente" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Docente</h4>
                  </div>
                  <div class="modal-body ">
                        <div class="register-box-body" style="background-color:#eee;" >
                            <img  class="profile-user-img img-responsive img-circle" src="assets/lte/dist/img/avatar-02.png" class="user-image" alt="User Image">
                                <div class="form-group has-feedback">
                                    <input type="text" name="iddocente_editar" id="iddocente_editar" class="hidden">
                                    <input type="text" name="idpersona_editar" id="idpersona_editar" class="hidden">
                                    <input type="text" minlength="8" name="Cedula_Docente_Editar" id="Cedula_Docente_Editar" readonly=»readonly» class="form-control requerido" required placeholder="Numero de Cedula">
                                    <small>Cedula de Identidad</small>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Nombre_Docente_Editar"id="Nombre_Docente_Editar" class="form-control requerido" required placeholder="Nombre">
                                    <small>Nombre</small>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Apellido1_Docente_Editar" id="Apellido1_Docente_Editar" class="form-control requerido" required placeholder="Primer apellido">
                                    <small>Primer Apellido</small>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Apellido2_Docente_Editar" id="Apellido2_Docente_Editar" class="form-control " placeholder="Segundo apellido">
                                    <small>Segundo Apellido</small>
                                </div>
                                <div class="form-group has-feedback row">
                                        <div class="col-md-3">
                                            <select class="form-control" aria-required="true" required name="Sexo_Docente_Editar" id="Sexo_Docente_Editar"  aria-placeholder="sexo"> 
                                                <option value="F">F</option>
                                                <option value="M">M</option>
                                            </select>
                                            <small>Sexo</small>
                                        </div>
                                        <div class="col-md-4">
                                                <select class="form-control" aria-required="true" required name="Estado_Editar" id="Estado_Editar"  aria-placeholder="sexo"> 
                                                        <option value="1">Activo</option>
                                                        <option value="0">Inactivo</option>
                                                </select>
                                                <small>Estado</small>
                                            </div>
                                        <div class="col-md-5">                                    
                                            <input  minlength="8" type="text" name="Telefono_Docente_Editar" id="Telefono_Docente_Editar" class="form-control pull-right requerido" placeholder="Telefono">
                                            <br/>    
                                            <small>Telefono</small>
                                        </div>
                                        
                                    </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Correo_Docente_Editar" id="Correo_Docente_Editar" class="form-control " placeholder="Correo Electronico">
                                    <small>Correo Electronico</small>
                                </div>
                                <div class="form-group has-feedback">
                                <textarea class="form-control text-primary" name="Direccion_Docente_Editar" rows="3" id="Direccion_Docente_Editar" placeholder="Direccion" required></textarea> 
                                <small>Direccion</small>
                                </div>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="datepickerDocenteEditar" type="text" class="form-control pull-right requerido" id="datepickerDocenteEditar" required>            
                                        <small>Fecha de Nacimiento</small>
                                    </div> 
                        </div>  
                <div class="modal-footer">
                    <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline" id="editar_confirmar_Docente">Guardar</button> 
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>        
            </div>
            </div>
</form>