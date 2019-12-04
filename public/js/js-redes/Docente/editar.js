var dat; //variable global que guarda el dato "tr" (Fila a editar)
function editar_Docente(button)
{
    dat = $(button).closest("tr"); //captura toda la fila donde se efectuo el click (Editar)
    $('#editar_Docente').modal('show'); // abre ventana modal
    var ide=$(button).attr("data-id");//obtiene el id del docente
    
    $.ajax({
        type: 'POST',
        url: 'docente/cargar/'+ide,
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
          for(var a=0; a<data.length;a++){
              var id=data[a].idDocente;
              var id2=data[a].idPersona;
              var cedula=data[a].Cedula;
              var nombre=data[a].Nombre;
              var apellido1=data[a].Apellido1;
              var apellido2=data[a].Apellido2;
              var sexo=data[a].Sexo;
              var direccion=data[a].Direccion;
              var correo=data[a].Correo;
              var telefono=data[a].Telefono;
              var fecha=data[a].FechaNacimiento;
              var estado=data[a].Estado;
          }
          $('#iddocente_editar').val(id);
          $('#idpersona_editar ').val(id2);
          $('#Cedula_Docente_Editar').val(cedula);
          $('#Nombre_Docente_Editar').val(nombre);
          $('#Apellido1_Docente_Editar').val(apellido1);
          $('#Apellido2_Docente_Editar').val(apellido2);
          $('#Sexo_Docente_Editar').val(sexo);
          $('#Telefono_Docente_Editar').val(telefono);
          $('#Estado_Editar').val(estado);
          $('#Correo_Docente_Editar').val(correo); 
          $('#Direccion_Docente_Editar').val(direccion); 
          $('#datepickerDocenteEditar').val(fecha);     
      }
    });//Fin ajax 
    
}

$("#editar_confirmar_Docente").click(function() {
    $.ajax({
                
        type: 'POST',
        url: 'actualizar/docente', // ruta editar oferta
        data: $('#editar_docente').serialize(), // manda el form donde se encuentra la modal oferta
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){
        if ((data==1)) // si se actualiza todo correcto
        { 
            //capturamos datos
            var id=$('#iddocente_editar').val();
            var cedula=$('#Cedula_Docente_Editar').val();
            var nombre=$('#Nombre_Docente_Editar').val()+" "+$('#Apellido1_Docente_Editar').val()+" "+$('#Apellido2_Docente_Editar').val();            
            var sexo=$('#Sexo_Docente_Editar').val();
            var telefono=$('#Telefono_Docente_Editar').val();
            var correo=$('#Correo_Docente_Editar').val(); 
            
            var datos=  "<tr>"+                            
                  "<td>"+cedula+"</td>"+
                  "<td>"+nombre+"</td>"+
                  "<td>"+sexo+"</td> "+
                  "<td>"+correo+"</td>"+
                  "<td style='padding-top:0.1%; padding-bottom:0.1%;' class='hidden' id="+id+" >"+
                              "<button class='btn btn-primary'  onclick='ver_docente(this);' data-id="+id+" id='Ver-docente'>ver</button>"+
                              "<button class='btn btn-success' onclick='editar_Docente(this);' data-id="+id+"><i class='fa fa-fw fa-pencil'></i></button>"+
                              "<button class='btn btn-info' onclick='eliminar_oferta(this);' data-id="+id+"><i class='fa fa-fw fa-trash '></i></button>"+
                             " <i class='fa fa-angle-double-right pull-right' onclick='ver_completo(this);'  data-id="+id+"></i>"+                             
                  "</td>"+
                  "</td>"+
                  "<td id="+id+"a>"+telefono+ "<i class='fa fa-angle-double-right pull-right' onclick='ver_completo(this);' data-id="+id+"></i> </td>"            
                "</tr>"  //Datos a ingresar en la tabla docentes

           
                dat.replaceWith(datos); //reemplaza por los nuevos datos
                $("#exito").modal("show"); //abre modal de exito
                $("#exito").fadeTo(2000,500).slideUp(450,function(){   // cierra la modal despues del tiempo determinado  
                    $("#exito").modal("hide"); // cierra modal                                           
                    } );
                $("#editar_Docente").modal("hide"); // cierra modal
        }
        else 
            {
                    var error="Error Al Actualizar, verifique xfa"
                    $('#mensaje').text(error);   //manda el error a la modal
                    $("#Mensaje-error").modal("show"); //abre modal de error
                    $("#Mensaje-error").fadeTo(2900,500).slideUp(450,function(){// cierra la modal despues del tiempo determinado  
                        $("#Mensaje-error").modal("hide"); // cierra modal error
                        } );
            }     
        }
        });
    });