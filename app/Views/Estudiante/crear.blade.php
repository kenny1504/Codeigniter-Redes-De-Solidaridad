<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="ingresar_Estudiante"  >
    <div class="modal  modal-info fade"  id="crear_estudiante" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ingresar Estudiante</h4>
                  </div>
                  <div class="modal-body ">
                        <div class="register-box-body" style="background-color:#eee;" >
                            <img  class="profile-user-img img-responsive img-circle" src="assets/lte/dist/img/estudiante.png" class="user-image" alt="User Image">
                                <div class="form-group has-feedback">
                                    <input type="text" id="Nombre-completo" class="form-control" placeholder="Codigo estudiante">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" id="Nombre-completo" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="email"  id="Nombre-de-usuario" class="form-control" placeholder="Primer apellido">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" id="contraseña" class="form-control" placeholder="Segundo apellido">
                                </div>
                                <div class="form-group has-feedback">
                                    <select style="width: 20%; padding-top: 2.3%; " name="roles" id="roles" aria-placeholder="sexo"> 
                                    <option value=" " disabled selected>Sexo</option>
                                    <option value="F">F</option>
                                    <option value="M">M</option>
                                    <style>
                                    select:requerid:invalid{
                                        color:gray;
                                    }
                                    option[value=""][disabled]
                                    {
                                        display: none;
                                    }
                                    .register-box-body{
                                        color:gray !important;
                                    }
                                    </style>
                                    </select>                                     
                                    <input  style="width: 75%;" type="text" id="contraseña" class="form-control pull-right" placeholder="Telefono">
                                </div>
                                <div class="form-group has-feedback">
                                    <select  style="width: 80%; padding-top: 2.7%; " name="tutores" id="tutores">
                                            <option value=" " disabled selected>Tutor</option>
                                    </select>
                                    <small style="padding-top: 2%;" class=" btn-sm pull-right btn-warning  ver-tutor">Ingresar Tutor</small>
                                </div>
                                <div class="form-group has-feedback">
                                    <select  style="width: 100%; padding-top: 2.5%; " name="roles" id="roles">
                                            <option value=" " disabled selected>Parentesco</option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                <textarea class="form-control text-primary" rows="3" id="dir" placeholder="Direccion"></textarea> 
                                </div>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input placeholder="Fecha de Nacimiento" type="text" class="form-control pull-right" id="datepicker">            
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
