//Metodo para mostrar u ocultar botones en index Estudiantes
var n=0; var fila; var id1; var id2;
$(".mostrar").click(function() { // ajax para eliminar un grado
    fila=$(this).parents("tr"); //captura fila para ponerle color
    fila.attr("style","background-color:#F9E79F;"); // le pones color a la fila seleccionada
    var iden=$(this).attr("data-id"); // captura el id_grado "id" del grado
     id1="#"+iden;//captura id de la celda de botones
     id2="#"+iden+"a";// captura id del contenido a ocultar o mostrar
    if(n==0){
      $(id1).removeClass('hidden'); 
      $(id2).addClass('hidden');
      n=1; // oculta error del servidor(validacion-servidor)
    }
    else{
        fila.attr("style"," ");//remueve el color a fila
        $(id2).removeClass('hidden'); //muestra celda
        $(id1).addClass('hidden'); // oculta botones
        n=0;
    }
}); 

//datos estudiante
var codigo;
var nombre;
var apellido1;
var apellido2;
var fecha;
var tutor;
var parentesco;
var telefono;
var dirreccion;
var sexo;
//datos tutor
var  cedula;
var nombret;
var apellido1t;
var apellido2t;
var fechat;
var correot;
var telefonot;
var dirrecciont;
var sexot;

function ver_estudiante(button){ 

   $("#perfil_estudiante").modal("show"); //abre modal ver usuario
   var id=$(button).attr("data-id");

   $.ajax({
    type: 'POST',
    url: 'estudiante/cargar/'+id, // llamada a la consulta
    dataType: "JSON", // tipo de respuesta del controlador
    success: function(data){
    
    //obtiene datos del estudiante
     codigo=data[0].CodigoEstudiante;
     nombre=data[0].Nombre;
     apellido1=data[0].Apellido1;
     apellido2=data[0].Apellido2;
     fecha=data[0].FechaNacimiento;
     tutor=data[0].Nombret+" "+data[0].apellido1t+" "+data[0].Apellido2; // nombre completo del tutor
     parentesco=data[0].Parentesco; 
     telefono=data[0].Telefono;
     dirreccion=data[0].Direccion;
     sexo=data[0].Sexo;

   //asignar valores obtenidos en el ajax aventana modal
   $('#N1').text(nombre);
   $('#p1').text(apellido1);
   $('#p2').text(apellido2);
   $('#s').text(sexo);
   $('#fn').text(fecha);
   $('#t').text(tutor);
   $('#p').text(parentesco);
   $('#te').text(telefono);
   $('#dir').text(dirreccion);
   $('#co').text(codigo);
     
   fila.attr("style"," ");//remueve el color a fila
   $(id2).removeClass('hidden'); //muestra celda
   $(id1).addClass('hidden'); // oculta botones
  }
   });//Fin cargar datos estudiante y tutor
   
  };//fin metodo



  