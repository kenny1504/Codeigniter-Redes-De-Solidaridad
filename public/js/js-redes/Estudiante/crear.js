$(function() //funcion para buscar dentro del combobox
{
  $('#tutores').select2({width:"80%"}) // agrega el select2 a combobox tutores para buscar 
  $('#parent').select2({width:"100%"})
});

$('#datepicker3').datepicker({ //sirve para mostrar Datepicker
  autoclose: true
})

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
    });//Fin ajax combobox tutores

    $.ajax({ // ajax para cargar datos en el combobox
      type: 'POST',
      url: '/estudiante/parentesco', // llamada a ruta para cargar combobox con datos de tabla materia
      dataType: "JSON", // tipo de respuesta del controlador
      success: function(data){ 
        $('#parent').empty();
      //ciclo para recorrer el arreglo de roles
        var datos2 ="<option value=' ' disabled selected>Parentesco</option>";
        data.forEach(element => {
            //variable para asignarle los valores al combobox
           datos2+='<option  value="'+element.id+'">'+element.Parentesco+'</option>'; 
        });
        
        $('#parent').append(datos2); //ingresa valores al combobox
    }   
  });//Fin ajax combobox parentesco

}//fin del metodo Ingresar_usuario
