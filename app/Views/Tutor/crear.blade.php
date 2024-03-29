<!--form para poder activar la ruta y poder guardar el registro--><!-- -->
<form id="ingresar_tutor"  >
    <div class="modal  modal-info fade"  id="crear_tutor" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ingresar Tutor</h4>
                  </div>
                  <div class="modal-body ">
                        <div class="register-box-body" style="background-color:#eee;" >
                            <img  class="profile-user-img img-responsive img-circle" src="assets/lte/dist/img/avatar-07.png" class="user-image" alt="User Image">
                                <div class="form-group has-feedback">
                                    <input minlength="16" type="text" name="Cedulat" id="Cedulat" class="form-control requerido" required placeholder="Cedula">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text"  name="Nombre-tutor" id="Nombre-tutor" class="form-control requerido" required placeholder="Nombre">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text"  name="apellido1-tutor" id="apellido1-tutor" class="form-control requerido" required placeholder="Primer apellido">
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="apellido2-tutor" id="apellido2-tutor" class="form-control"  placeholder="Segundo apellido">
                                </div>
                                <div class="form-group has-feedback">
                                    <select class="requerido" style="width: 20%; padding-top: 2.3%; " name="sexot" id="sexot" required aria-placeholder="sexo"> 
                                    <option value=" " disabled selected>Sexo</option>
                                    <option value="F">F</option>
                                    <option value="M">M</option>
                                    <style>
                                    /*Codigo para aplicar placeholder a combobox */
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
                                    <input minlength="8"  style="width: 75%;" type="text" id="telefonot" name="telefonot" class="form-control pull-right requerido" required placeholder="Telefono">
                                </div>                           
                                <div class="form-group has-feedback">
                                    <select style="width: 80%; padding-top: 2.7%; " required name="oficiot" id="oficiot">
                                    </select>
                                    <small style="padding-top: 1.3%;" data-toggle="modal" data-target="#modal_Oficio" id="m3" class=" btn-sm pull-right btn-warning ">Ingresar Oficio</small>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="email"  name="correot" id="correot" class="form-control requerido" required placeholder="Correo Electronico">
                                </div>
                                <div class="form-group has-feedback">
                                <textarea class="form-control text-primary requerido" rows="3" id="direcciont" name="direcciont" required placeholder="Direccion"></textarea> 
                                </div>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input autocomplete="off" required placeholder="Fecha de Nacimiento" type="text" class="form-control pull-right requerido" name="datepickertutor" id="datepickertutor">            
                                    </div> 
                        </div>  
                <div class="modal-footer">
                    <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit"  onclick="guardar_Tutor();" class="btn btn-outline"  >Guardar</button>          
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>        
            </div>
            </div>
</form>