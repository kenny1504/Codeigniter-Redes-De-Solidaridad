 //Metodo para mostrar u ocultar botones en index Docentes
var n=0; var fila; var it1; var it2;
function ver_completo(button){ 
    fila=$(button).parents("tr"); //captura fila para ponerle color
    fila.attr("style","background-color:#F9E79F;"); // le pones color a la fila seleccionada
    var iden=$(button).attr("data-id"); // captura el id_docente "id" del docente
     it1="#"+iden;//captura id de la celda de botones
     it2="#"+iden+"a";// captura id del contenido a ocultar o mostrar
    if(n==0){
      $(it1).removeClass('hidden'); 
      $(it2).addClass('hidden');
      n=1; // oculta error del servidor(validacion-servidor)
    }
    else{
        fila.attr("style"," ");//remueve el color a fila
        $(it2).removeClass('hidden'); //muestra celda
        $(it1).addClass('hidden'); // oculta botones
        n=0;
    } 
};  

function ver_docente(button){ 

    $("#perfil_docente").modal("show"); //abre modal ver docente
    var id=$(button).attr("data-id");
 
    $.ajax({
     type: 'POST',
     url: 'docente/cargar/'+id, // llamada a la consulta
     dataType: "JSON", // tipo de respuesta del controlador
     success: function(data){
     
     //obtiene datos del docente
      var cedula=data[0].Cedula;
      var nombre=data[0].Nombre;
      var apellido1=data[0].Apellido1;
      var apellido2=data[0].Apellido2;
      var sexo=data[0].Sexo;
      var direccion=data[0].Direccion; 
      var correo=data[0].Correo;
      var telefono=data[0].Telefono;
      var fecha=data[0].FechaNacimiento;
      var estado=data[0].Estado;
 if(data[0].Estado==1)
 {
    $('#estad').text("Activo");
 }
 else
 {
    $('#estad').text("Inactivo");
 }
    //asignar valores obtenidos en el ajax aventana modal
    $('#cedul').text(cedula);
    $('#nombr').text(nombre);
    $('#apellid1').text(apellido1);
    $('#apellid2').text(apellido2);
    $('#sex').text(sexo);
    $('#fechanaci').text(fecha);
    $('#telefon').text(telefono);
    
    $('#corre').text(correo);
    $('#direccio').text(direccion);
   
      
    fila.attr("style"," ");//remueve el color a fila
    $(it2).removeClass('hidden'); //muestra celda
    $(it1).addClass('hidden'); // oculta botones
   }
    });
    
   };//fin metodo