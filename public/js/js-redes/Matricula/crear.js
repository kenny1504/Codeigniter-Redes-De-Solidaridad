$('#datepickerMatricula').datepicker({ //Fecha Matricula
    format: 'yyyy',
    viewMode: "years",
    minViewMode: "years",
    autoclose: true,
  }).datepicker("setDate", new Date());

  $('#datepickerFechaMatricula').datepicker({ //sirve para mostrar Datepicker
    format: 'yyyy-mm-dd',
    autoclose: true
  }).datepicker("setDate", new Date());

var dat;
function ingresar_matricula(button)
{   
        $('#Seccion_M').val("");
        $('#Docente_M').val("");
        $('#Grado_M').val("");
        $('#Grupo_M').val("");
        $('#asignaturas_grado_M').empty();
        dat = $(button).closest("tr"); //captura toda la fila donde se efectuo el click (Matricular)
        $('#crear_matricula').modal('show'); // abre ventana modal
        var ide=$(button).attr("data-id");//obtiene el id del estudiante a matricular
      
      $.ajax({
        type: 'POST',
        url: 'estudiante/cargar_editar/'+ide, // llamada a la consulta
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){
            $('#CodigoE_M').val(data[0].CodigoEstudiante);
            $('#NombreE_M').val(data[0].Nombre+' '+data[0].Apellido1+' '+data[0].Apellido2);
            
          }
       });//Fin cargar datos del estudiante a matricular

    $.ajax({
        type: 'POST',
        url: 'cargarturnos/turno', // llamada a ruta para cargar combobox con datos de tabla turno
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){        
          $('#Turno').empty();//limpia el combobox
          data.forEach(element => { //ciclo para recorrer el arreglo de turno
              //variable para asignarle los valores al combobox
            var datos='<option  value="'+element.id+'">'+element.Nombre+'</option>';

              $('#Turno').append(datos);//ingresa valores al combobox
              $('#Turno').val(''); // limpiar los turno
          });          
      }
    });//Fin ajax combobox Turno

}//fin del metodo

$(".carga_oferta").click(function() { //ajax para ver  ofertas
  
  //if($('#datepickerMatricula').select()!="") // si se ha seleccionado una año
  //{
    $.ajax({
      type: 'POST',
      url: 'oferta/cargar_ofertas/'+$('#datepickerMatricula').val(),//ruta para cargar la descripcion de las ofertas
      dataType: "JSON", // tipo de respuesta del controlador
      success: function(data){ 
          $('#Oferta_M').empty();//limpia el combobox
        for(var a=0; a<data.length;a++){          
            var datos='<option  value="'+data[a].idOferta+'">'+data[a].Descripcion+'</option>';
            $('#Oferta_M').append(datos);//ingresa valores al combobox de ofertas
            $('#Oferta_M').val(''); // limpiar las ofertas
        }               
    }
  });//Fin ajax 

  //}        
}); //fin de funcion

$(".oferta_ver").click(function() { //ajax para ver detalles de oferta
  
    if($('#Oferta_M').val()!=null) // si se ha seleccionado una oferta
    {
    $.ajax({
      type: 'POST',
      url: 'oferta/cargar/'+$('#Oferta_M').val(), //llamada a la ruta para mostrar detalles
      dataType: "JSON", // tipo de respuesta del controlador
      success: function(data){ //carga el detalle de la oferta
        
        for(var a=0; a<data.length;a++){          
        $('#Seccion_M').val(data[0].Nombre_Seccion);
        $('#Docente_M').val(data[0].Nombre_Docente);
        $('#Grado_M').val(data[0].Nombre_Grado);
        $('#Grupo_M').val(data[0].Nombre_Grupo);
        }     
    }
    });//fin de ajax
    //***************** AJAX PARA CARGAR ASIGNATURAS EN TABLA  ************* */
    $('#asignaturas_grado_M').empty(); //limpia la tabla
    $.ajax({
        type: 'POST',
        url: 'matricula/cargarmaterias_grado_M/'+$('#Oferta_M').val(), // llamada a ruta para cargar asignaturas en las tablas
        //data: $('#ingresar_Matricula').serialize(), // manda el form donde se encuentra la modal 
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 

                for(var a=0; a<data.length;a++){
                    var datos=  "<tr id=" + data[a].id + ">"+"<td>"+data[a].Nombre+"</td>"
                        + "<td>"+ "<button type='button' class='btn btn-danger' data-id="+ data[a].id +" onclick=''><i class='fa fa-fw fa-trash '></i></button>"                                   
                        +"</td>"+"</tr>"; // variable guarda el valor del registro de materias
                    $('#asignaturas_grado_M').append(datos); // agrega nuevo registro a tabla
                }         
            }      
    });//Fin ajax cargar materias en tabla

    }        
  }); //fin de funcion