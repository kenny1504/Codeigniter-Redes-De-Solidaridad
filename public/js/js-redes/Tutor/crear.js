$(function() //funcion para buscar dentro del combobox
{
  $('#oficio').select2({width:"80%"}) // agrega el select2 a combobox tutores para buscar
});
$('#datepickertutor').datepicker({ //sirve para mostrar Datepicker
    format: 'yyyy-mm-dd',
    autoclose: true
  })

function ingresar_tutor()
{   
    $('#crear_tutor').modal('show'); // abre ventana modal
    $.ajax({ // ajax para cargar datos en el combobox
        type: 'POST',
        url: 'cargar/oficio', // llamada a ruta para cargar combobox oficio
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
          $('#oficiot').empty();
        //ciclo para recorrer el arreglo de oficios
          data.forEach(element => {
              //variable para asignarle los valores al combobox
             var datos='<option  value="'+element.id+'">'+element.Nombre+'</option>'; 
  
              $('#oficiot').append(datos); //ingresa valores al combobox
          });
          
      }   
    });//Fin ajax combobox oficios
}//fin del metodo Ingresar_tutor

function guardar_Tutor()
{ 
      $("#ingresar_tutor").on('submit', function(evt){
        evt.preventDefault();  
      });
      //Verifica que le formulario no este vacio
      if($('#Cedulat').val().length==16 && $('#Nombre-tutor').val()!="" && $('#apellido1-tutor').val()!="" && $('#telefonot').val()!="" && $('#sexot').val()!=null && $('#oficiot').val()!=null 
      && $('#correot').val()!=null&& $('#direcciont').val()!="" && $('#datepickertutor').val()!="")
      {
          if($("#telefonot").val().length==8 && ValidarCedulaTutor($('#Cedulat').val())==true) //verifica que el input contenga 8 valores 
          {

            $.ajax({ // ajax para guardar docente
              type: 'POST',
              url: 'tutor/agregar', // llamada a ruta para guardar un nuevo tutor
              data: $('#ingresar_tutor').serialize(), // manda el form donde se encuentra la modal ingresar_tutor
              dataType: "JSON", // tipo de respuesta del controlador
              success: function(data){ 
               if(data==0) // muestra mensaje de error
               {
                  var error="El tutor ya existe, favor reingresar Cedula"
                  $('#mensaje').text(error);   //manda el error a la modal
                  $("#Mensaje-error").modal("show"); //abre modal de error
                  $("#Mensaje-error").fadeTo(2900,500).slideUp(450,function(){// cierra la modal despues del tiempo determinado  
                      $("#Mensaje-error").modal("hide"); // cierra modal error
                      } );

               }
               else if(data==2) // muestra mensaje de error
               {
                  var error="Error al insertar"
                  $('#mensaje').text(error);   //manda el error a la modal
                  $("#Mensaje-error").modal("show"); //abre modal de error
                  $("#Mensaje-error").fadeTo(2900,500).slideUp(450,function(){// cierra la modal despues del tiempo determinado  
                      $("#Mensaje-error").modal("hide"); // cierra modal error
                      } );

               }
               else
               {
                $("#exito").modal("show"); //abre modal de exito
                               
                $("#crear_tutor").modal("hide"); // cierra modal
                $("#exito").fadeTo(2000,500).slideUp(450,function(){   // cierra la modal despues del tiempo determinado  
                          $("#exito").modal("hide"); // cierra modal
                          } );

               }
               
            }   
          });//Fin ajax Guardar tutor
          
          }
          else{
            return ValidarCedulaTutor($('#Cedulat').val());
          }
                 
      }
}