<!--form para poder activar la ruta y poder guardar el registro de matricula--><!-- -->
<form id="ingresar_Matricula"  >
    <div class="modal  modal-info fade"  id="crear_matricula" >
              <div class="modal-dialog" >
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Matricular</h4>
                  </div>
                  <div class="modal-body ">
                        <div class="register-box-body" style="background-color:#eee;" >
                            <img  class="profile-user-img img-responsive img-circle" src="assets/lte/dist/img/hat-1674894_1280.png" class="user-image" alt="User Image">
                            <div class="form-group has-feedback row">
                                <div class="col-md-9">

                                    
                                    <input type="text" name="idestudiante_M" id="idestudiante_M" class="hidden">
                                    <input name="datepickerFechaMatricula" id="datepickerFechaMatricula" class="hidden"> <!--Mandar fecha actual con formato para MySql -->
                                    <label><?php echo date("d") . "/" . date("m") . "/" . date("Y") ?></label> 
                                    <br/> 
                                    <small>Fecha Matricula</small>
                                </div>
                                <div class="col-md-3">
                                    <input name="datepickerMatricula" type="text" class="form-control pull-left requerido" id="datepickerMatricula" required>         
                                    <br/> 
                                    <small>Año</small> 
                                </div> 
                            </div> 
                            <div class="form-group has-feedback row">
                                        <div class="col-md-4">  
                                            <input  type="text" name="CodigoE_M" id="CodigoE_M" class="form-control pull-right requerido" readonly="readonly" placeholder="Codigo Estudiante">  
                                            <br/>  
                                            <small>Codigo Estudiante</small> 
                                        </div> 
                                        <div class="col-md-7"> 
                                            <input type="text" name="NombreE_M" id="NombreE_M" class="form-control pull-left requerido" readonly="readonly" placeholder="Nombre Estudiante"> 
                                            <br/>  
                                            <small>Nombre Estudiante</small> 
                                        </div>  
                                </div>
                                <div class="form-group has-feedback"> 
                                        <select class="form-control " required name="Oferta_M" id="Oferta_M" aria-placeholder="Oferta"> 
                                            <option value="" disabled selected>Oferta Academica</option>
                                        </select>  
                                        <small>Oferta Academica</small> 
                                    </div>
                                <div class="form-group has-feedback row">
                                        <div class="col-md-10"> 
                                                <input type="text" name="Docente_M" id="Docente_M" class="form-control pull-left requerido" readonly="readonly" placeholder="Nombre Docente"> 
                                                <br/>  
                                                <small>Nombre Docente</small> 
                                            </div> 
                                        <div class="col-md-3">  
                                                <input  type="text" name="Grado_M" id="Grado_M" class="form-control pull-right requerido"  readonly="readonly" placeholder="Grado">  
                                                <br/>  
                                                <small>Grado</small> 
                                            </div>  
                                            <div class="col-md-4">  
                                                    <input  type="text" name="Grupo_M" id="Grupo_M" class="form-control pull-right requerido"  readonly="readonly" placeholder="Grupo">  
                                                    <br/>  
                                                    <small>Grupo</small> 
                                                </div>  
                                        <div class="col-md-4">  
                                                <input  type="text" name="Seccion_M" id="Seccion_M" class="form-control pull-right requerido" readonly="readonly" placeholder="Seccion">  
                                                <br/>  
                                                <small>Seccion</small> 
                                            </div>  
                                </div>


                                <div class="form-group has-feedback" >
                                        <table id="asignaturas_grado_M" name="asignaturas_grado_M" class="table table-bordered table-striped">                      
                                            </table> 
                                            <small>Materias</small>                                 
                                </div>


                                <div class="form-group has-feedback row">
                                    <div class="col-md-5"> 
                                        <select aria-required="true" required name="Turno" id="Turno" class="form-control" aria-placeholder="Turno"> 
                                        <option value="" disabled selected>Turno</option>
                                        </select>   
                                        <small>Turno</small>      
                                    </div>  
                                    <div class="col-md-5">                            
                                        <select aria-required="true" required name="Situacion_Matricula" id="Situacion_Matricula" class="form-control"   aria-placeholder="Situacion Matricula"> 
                                        <option value="" disabled selected>Situacion Matricula</option>
                                        </select> 
                                        <small>Situacion Matricula</small>  
                                    </div>
                                </div>
                        </div>  
                <div class="modal-footer">
                    <button type="reset"  class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" onclick="nueva_matricula();" class="btn btn-outline" >Guardar</button>      
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
              </div>        
            </div>
            </div>
</form>