$(function() //funcion para buscar dentro del combobox
{
  $('#oficios').select2({width:"80%"}) // agrega el select2 a combobox tutores para buscar
});
$('#datepicker4').datepicker({ //sirve para mostrar Datepicker
    autoclose: true
  })

function ingresar_tutor()
{   
    $('#crear_tutor').modal('show'); // abre ventana modal
    $.ajax({ // ajax para cargar datos en el combobox
        type: 'POST',
        url: '/cargar/oficio', // llamada a ruta para cargar combobox oficio
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
          $('#oficios').empty();
        //ciclo para recorrer el arreglo de oficios
          data.forEach(element => {
              //variable para asignarle los valores al combobox
             var datos='<option  value="'+element.Id+'">'+element.Nombre+'</option>'; 
  
              $('#oficios').append(datos); //ingresa valores al combobox
          });
          
      }   
    });//Fin ajax combobox oficios
}//fin del metodo Ingresar_usuario
