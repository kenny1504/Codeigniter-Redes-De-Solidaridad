$(function() //funcion para buscar dentro del combobox
{
  $('#tutores').select2({width:"80%"}) // agrega el select2 a combobox tutores para buscar
});

function ingresar_estudiante()
{   
    $('#crear_estudiante').modal('show'); // abre ventana modal
    $.ajax({ // ajax para cargar datos en el combobox
        type: 'POST',
        url: '/estudiante/tutores', // llamada a ruta para cargar combobox con datos de tabla materia
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
          $('#tutores').empty();
        //ciclo para recorrer el arreglo de roles
          data.forEach(element => {
              //variable para asignarle los valores al combobox
             var datos='<option  value="'+element.id+'">'+element.Nombre+'</option>'; 
  
              $('#tutores').append(datos); //ingresa valores al combobox
          });
      }   
    });//Fin ajax combobox roles
}//fin del metodo Ingresar_usuario
