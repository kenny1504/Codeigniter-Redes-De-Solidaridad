<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="editar_Estudiante"  >
    <div class="modal  modal-info fade"  id="edit_estudiante" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Estudiante</h4>
                  </div>
                  <div class="modal-body ">
                        <div class="register-box-body" style="background-color:#eee;" >
                            <img  class="profile-user-img img-responsive img-circle" src="assets/lte/dist/img/estudiante.png" class="user-image" alt="User Image">
                                <div class="form-group has-feedback">
                                    <input type="text" minlength="8" name="edit_Codigo" id="edit_Codigo" class="form-control requerido" required placeholder="Codigo estudiante">
                                    <small>Codigo de estudiante</small>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="edit_NombreE" id="edit_NombreE" class="form-control requerido" required placeholder="Nombre">
                                    <small>Nombre</small>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="edit_Apellido1" id="edit_Apellido1" class="form-control requerido" required placeholder="Primer apellido">
                                    <small>Primer apellido</small>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="edit_Apellido2" id="edit_Apellido2" class="form-control " placeholder="Segundo apellido">
                                    <small>Segundo apellido</small>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-3">
                                        <select class="form-control" aria-required="true" required name="edit_Sexo" id="edit_Sexo"  aria-placeholder="sexo"> 
                                            <option value="F">F</option>
                                            <option value="M">M</option>
                                        </select>
                                        <small>Sexo</small>
                                    </div>
                                    <div class="col-md-9">                                    
                                        <input  minlength="8" type="text" name="edit_telefono" id="edit_telefono" class="form-control pull-right requerido" placeholder="Telefono">
                                        <br/>    
                                        <small>Telefono</small>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <select aria-required="true" required  style="width: 80%; padding-top: 2.7%; " name="edit_tutores" id="edit_tutores">
                                    </select>
                                    <small onclick="ingresar_tutor();" style="padding-top: 1.3%;" class=" btn-sm pull-right btn-warning ">Ingresar Tutor</small>
                                    <small >Tutor</small>
                                </div>
                                <div aria-required="true" class="form-group has-feedback">
                                    <select  required style="width: 100%; padding-top: 2.5%; " name="edit_parent" id="edit_parent">
                                    </select>
                                    <small>Parentesco</small>
                                </div>
                                <div class="form-group has-feedback">
                                <textarea class="form-control text-primary" name="edit_Direccion" rows="3" id="edit_direccion_estudiante" placeholder="Direccion" required></textarea> 
                                <small>Direccion</small>
                                </div>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input placeholder="Fecha de Nacimiento" name="edit_fechanacient" type="text" class="form-control pull-right requerido" id="datepicker4" required>            
                                        <small>Fecha de nacimiento</small>
                                </div> 
                        </div>  
                <div class="modal-footer">
                    <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" onclick="guardar_editar_estudiante();" class="btn btn-outline" >Guardar</button>      
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>        
            </div>
            </div>
</form>
