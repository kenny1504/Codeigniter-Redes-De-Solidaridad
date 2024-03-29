<!--form para poder activar la ruta y poder editar el registro de Tutor--><!-- -->
<form id="editar_tutor"  >
        <div class="modal  modal-info fade"  id="editar_Tutor" >
                  <div class="modal-dialog" >
                    <div class="modal-content" >
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar Tutor</h4>
                      </div>
                      <div class="modal-body ">
                            <div class="register-box-body" style="background-color:#eee;" >
                                <img  class="profile-user-img img-responsive img-circle" src="assets/lte/dist/img/avatar-02.png" class="user-image" alt="User Image">
                                    <div class="form-group has-feedback">
                                        <input type="text" name="idtutor_editar" id="idtutor_editar" class="hidden">
                                        <input type="text" name="idpersona_tutor" id="idpersona_tutor" class="hidden">
                                        <input type="text"  minlength="16" name="Cedula_Tutor_Editar" id="Cedula_Tutor_Editar" class="form-control requerido" required placeholder="Numero de Cedula">
                                        <small>Cedula de Identidad</small>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="text" name="Nombre_Tutor_Editar"id="Nombre_Tutor_Editar" class="form-control requerido" required placeholder="Nombre">
                                        <small>Nombre</small>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="text" name="Apellido1_Tutor_Editar" id="Apellido1_Tutor_Editar" class="form-control requerido" required placeholder="Primer apellido">
                                        <small>Primer Apellido</small>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="text" name="Apellido2_Tutor_Editar" id="Apellido2_Tutor_Editar" class="form-control " placeholder="Segundo apellido">
                                        <small>Segundo Apellido</small>
                                    </div>
                                    <div class="form-group has-feedback row">
                                            <div class="col-md-3">
                                                <select class="form-control" aria-required="true" required name="Sexo_Tutor_Editar" id="Sexo_Tutor_Editar"  aria-placeholder="sexo"> 
                                                    <option value="F">F</option>
                                                    <option value="M">M</option>
                                                </select>
                                                <small>Sexo</small>
                                            </div>
                                            <div class="col-md-6">
                                                    <select class="form-control" required name="Oficio_Editar1" id="Oficio_Editar1">
                                                    </select>
                                                    <small>Oficio</small>
                                                </div>
                                            <div class="col-md-3">                                    
                                                <input  minlength="8" type="text" name="Telefono_Tutor_Editar" id="Telefono_Tutor_Editar" class="form-control pull-right requerido"required placeholder="Telefono">
                                                <br/>    
                                                <small>Telefono</small>
                                            </div>
                                            
                                        </div>
                                    <div class="form-group has-feedback">
                                        <input type="email" name="Correo_Tutor_Editar" id="Correo_Tutor_Editar" class="form-control "required placeholder="Correo Electronico">
                                        <small>Correo Electronico</small>
                                    </div>
                                    <div class="form-group has-feedback">
                                    <textarea class="form-control text-primary" name="Direccion_Tutor_Editar" rows="3" id="Direccion_Tutor_Editar" placeholder="Direccion" required></textarea> 
                                    <small>Direccion</small>
                                    </div>
                                    <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input name="datepickerTutorEditar" type="text" class="form-control pull-right requerido" id="datepickerTutorEditar" required>            
                                            <small>Fecha de Nacimiento</small>
                                        </div> 
                            </div>  
                    <div class="modal-footer">
                        <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" onclick="editar_confirmar_Tutor();" class="btn btn-outline" >Guardar</button> 
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                  </div>        
                </div>
                </div>
    </form>