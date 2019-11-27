
function editar_usuario(button)
{   
    $('#crear_usuario').modal('show'); // abre ventana modal
    var contraseña=$(button).attr("data-password");//obtiene el id de la materia
    var NombreUsuario=$(button).attr("data-user");//obtiene el id de la materia
    var cedula=$(button).attr("data-cedula");//obtiene el id de la materia
    var nombre_u=$(button).attr("data-Nombre");//obtiene el id de la materia
    var rol_user=$(button).attr("data-rol");//obtiene el id de la materia
    var vencimiento_user=$(button).attr("data-vencimiento");//obtiene el id de la materia
    $('#Nombre-completo').val(nombre_u); 
    $('#roles').val(rol_user);
    $('#Nombre-de-usuario').val(NombreUsuario);
    $('#contraseña').val(contraseña);
    $('#cedula').val(cedula);
    $('#datepicker').val(vencimiento_user);
    $("#nombreu").removeClass('hidden');
    $("#nombreuser").removeClass('hidden');
    $("#contraseñau").removeClass('hidden');
    $("#cedulau").removeClass('hidden');
    $("#rolau").removeClass('hidden');
    $("#vencimientou").removeClass('hidden');

    $.ajax({ // ajax para cargar datos en el combobox
        type: 'POST',
        url: 'roles', // llamada a ruta para cargar combobox con datos de tabla materia
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
          $('#roles').empty();
        //ciclo para recorrer el arreglo de roles
          data.forEach(element => {
              //variable para asignarle los valores al combobox
             var datos='<option  value="'+element.Id_FuncionAcceso+'">'+element.Descripcion+'</option>'; 
  
              $('#roles').append(datos); //ingresa valores al combobox
          });
          
      }   
    });//Fin ajax combobox roles
}//fin del metodo Ingresar_usuario


$(".b1").click(function(){ // limpia campos y oculta label´s

    $('#Nombre-completo').val(""); 
    $('#roles').val("");
    $('#Nombre-de-usuario').val("");
    $('#contraseña').val("");
    $('#cedula').val("");
    $('#datepicker').val(""); 
    $("#rolau").addClass('hidden');
    $("#vencimientou").addClass('hidden');
    $("#nombreu").addClass('hidden');
    $("#nombreuser").addClass('hidden');
    $("#contraseñau").addClass('hidden');
    $("#cedulau").addClass('hidden');
  });