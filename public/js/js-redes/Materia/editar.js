var dat; //variable global que guarda el dato "tr" (Fila a editar)
function editar_Materia(button)
{
    dat = $(button).closest("tr"); //captura toda la fila donde se efectuo el click (Editar)
    var name =$(button).parents("tr").find("td").text(); //obtiene nombre de la materia (nuevo)
    var ide=$(button).attr("data-id");//obtiene el id de la materia
    //var name=$(button).attr("data-Nombre"); //anterior capturar nombre
    $('#editar_Materia').modal('show'); // abre ventana modal
    $('.error').addClass('hidden'); // oculta error del servidor(validacion-servidor)
    $('#idmateria').val(ide);   //manda valor "id" a ventana modal Nombre
    $('#Nombre-Materia').val(name);
}

function Ingresar(e) { // Metodo para guardar(editar) datos los datos al presionar ENTER 
    var tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13) // si es 13 entonces presiono ENTER
    {
        $("#editar_confirmar").click(); // llama al evento click "editar_confirmar"
    }
  }
    $("#editar_confirmar").click(function() {
        $.ajax({
                
                    type: 'POST',
                    url: 'actualizar/asignatura', // ruta editar materia
                    data: $('#editar-materia').serialize(), // manda el form donde se encuentra la modal materia
                    dataType: "JSON", // tipo de respuesta del controlador
                    success: function(data){
                        if ((data.msg!=true)) { // si el ajax contiene errores agrega un label indicando el error 
                                $('.error').removeClass('hidden');
                                $('.error').text("Error: "+ data.Nombre); 
                          } else {
                                var datos=  "<tr id=" + data.id + ">"+"<td>"+data.Nombre+"</td>"
                                + "<td style='padding-top:0.1%; padding-bottom:0.1%;'>"+"<button class='btn btn-success'  onclick='editar_Materia(this);' data-id="+ data.id +" data-Nombre="+data.Nombre+"><i class=' fa fa-fw fa-pencil'></i></button>"
                                + "<button class='btn btn-info ' onclick='eliminar(this);' data-id="+ data.id +"><i class='fa fa-fw fa-trash '></i></button>"                                   
                                +"</td>"+"</tr>";// variable guarda los nuevos valores

                                dat.replaceWith(datos); //reemplaza por los nuevos datos
                                $("#exito").modal("show"); //abre modal de exito
                                $("#exito").fadeTo(2000,500).slideUp(450,function(){   // cierra la modal despues del tiempo determinado  
                                            $("#exito").modal("hide"); // cierra modal
                                            
                                            } );
                                 $("#editar_Materia").modal("hide"); // cierra modal
                                 }
                      }
             });
 });