var dat; //variable global que guarda el dato "tr" (Fila a eliminar)
$(".eliminar-grado").click(function() { // ajax para eliminar un grado
    dat = $(this).closest("tr"); //captura toda la fila donde se efectuo el click (Eliminar)
    var iden=$(this).attr("data-id1"); // captura el id_grado "id" del grado
    $('#eliminar_Grado').modal('show'); // abre ventana modal
    $('#valor_id_grado').val(iden);   //manda valor_id_grado "id" a ventana modal
}); 

function eliminar_grado(button)
{
    dat = $(button).closest("tr"); //captura toda la fila donde se efectuo el click (Eliminar)
    var ide=$(button).attr("data-id1"); // captura el valor_id_grado "id" de la grado
    $('#eliminar_Grado').modal('show'); // abre ventana modal
    $('#valor_id_grado').val(ide);   //manda valor_id_grado "id" a ventana modal
}
//url="/elimina/asignatura"; //kenny
    $("#confirmar_eliminar_grado").click(function() {      
         $.ajax({
                    type: 'POST',
                    url: 'eliminar/grado', // ruta eliminar materia
                    data: $('#delete_grado').serialize(), // manda el form donde se encuentra la modal grado
                    success: function(data){ 
                    dat.remove(); //remueve la fila eliminado 
                    $("#exito").modal("show"); //abre modal de exito
                    $("#exito").fadeTo(2000,500).slideUp(450,function(){   // cierra la modal despues del tiempo determinado  
                                $("#exito").modal("hide"); // cierra modal
                                } );
                    }
             });// 

    });