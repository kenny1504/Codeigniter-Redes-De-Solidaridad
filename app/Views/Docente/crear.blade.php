<!--form para poder activar la ruta y poder guardar el registro de docente--><!-- -->
<form id="ingresar_Docente"  >
    <div class="modal  modal-info fade"  id="crear_docente" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ingresar Docente</h4>
                  </div>
                  <div class="modal-body ">
                        <div class="register-box-body" style="background-color:#eee;" >
                            <img  class="profile-user-img img-responsive img-circle" src="assets/lte/dist/img/avatar-02.png" class="user-image" alt="User Image">
                                <div class="form-group has-feedback">
                                    <input type="text" minlength="14" name="Cedula_Docente" id="Cedula_Docente" class="form-control requerido" required placeholder="Cedula de Identidad">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Nombre_Docente"id="Nombre_Docente" class="form-control requerido" required placeholder="Nombre">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Apellido1_Docente" id="Apellido1_Docente" class="form-control requerido" required placeholder="Primer apellido">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="Apellido2_Docente" id="Apellido2_Docente" class="form-control " placeholder="Segundo apellido">
                                </div>
                                <div class="form-group has-feedback">
                                    <select aria-required="true" required style="width: 20%; padding-top: 2.3%; " name="Sexo_Docente" id="Sexo_Docente"  aria-placeholder="sexo"> 
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
                                    <input  minlength="8" style="width: 55%;" type="text" name="Telefono_Docente" id="Telefono_Docente" class="form-control pull-right requerido"required placeholder="Telefono">

                                    <select aria-required="true" required style="width: 20%; padding-top: 2.3%; " name="Estado" id="Estado"  aria-placeholder="estado"> 
                                        <option value="" disabled selected>Estado</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
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

                                </div>
                                <div class="form-group has-feedback">
                                    <input type="email" name="Correo_Docente" id="Correo_Docente" class="form-control " placeholder="Correo Electronico">
                                </div>
                                <div class="form-group has-feedback">
                                <textarea class="form-control text-primary" name="Direccion_Docente" rows="3" id="Direccion_Docente" placeholder="Direccion" required></textarea> 
                                </div>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input autocomplete="off"  placeholder="Fecha de Nacimiento" name="datepickerDocente" type="text" class="form-control pull-right requerido" id="datepickerDocente" required>            
                                    </div> 
                        </div>  
                <div class="modal-footer">
                    <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" onclick="nuevo_docente();" class="btn btn-outline" >Guardar</button>      
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>        
            </div>
            </div>
</form>