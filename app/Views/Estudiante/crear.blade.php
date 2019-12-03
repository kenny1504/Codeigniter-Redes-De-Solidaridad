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
                                    <input type="text" name="Codigo" id="Codigo" class="form-control requerido" required placeholder="Codigo estudiante">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="NombreE"id="NombreE" class="form-control requerido" required placeholder="Nombre">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Apellido1" id="Apellido1" class="form-control requerido" required placeholder="Primer apellido">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Apellido2" id="Apellido2" class="form-control " placeholder="Segundo apellido">
                                </div>
                                <div class="form-group has-feedback">
                                    <select aria-required="true" required style="width: 20%; padding-top: 2.3%; " name="Sexo" id="Sexo"  aria-placeholder="sexo"> 
                                    <option value="" disabled selected>Sexo</option>
                                    <option value="F">F</option>
                                    <option value="M">M</option>
                                    <style>
                                    /*Codigo para aplicar placeholder a combobox */
                                    option[value=""][disabled]
                                    {
                                        display: none;
                                    }
                                    .register-box-body{
                                        color:gray !important;
                                    }
                                    </style>
                                    </select>                                     
                                    <input  style="width: 75%;" type="text" name="telefono" id="telefono" class="form-control pull-right requerido" placeholder="Telefono" required>
                                </div>
                                <div class="form-group has-feedback">
                                    <select aria-required="true" required  style="width: 80%; padding-top: 2.7%; " name="tutores" id="tutores">
                                            <option value="" disabled selected>Tutor</option>
                                    </select>
                                    <small onclick="ingresar_tutor();" style="padding-top: 1.3%;" class=" btn-sm pull-right btn-warning ">Ingresar Tutor</small>
                                </div>
                                <div aria-required="true" class="form-group has-feedback">
                                    <select  required style="width: 100%; padding-top: 2.5%; " name="parent" id="parent">
                                    <option value="" disabled selected>Parentesco</option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                <textarea class="form-control text-primary" name="direccion" rows="3" id="dir" placeholder="Direccion" required></textarea> 
                                </div>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input placeholder="Fecha de Nacimiento" name="fechanacient" type="text" class="form-control pull-right requerido" id="datepicker3" required>            
                                    </div> 
                        </div>  
                <div class="modal-footer">
                    <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" onclick="nuevo_estudiante();" class="btn btn-outline" >Guardar</button>      
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>        
            </div>
            </div>
</form>
