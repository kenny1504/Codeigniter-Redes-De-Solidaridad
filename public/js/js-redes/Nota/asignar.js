$(document).ready(function(){ //ajax para cargar combo box en vista Notas
    $.ajax({
        type: 'POST',
        url: 'cargargrados/oferta', // llamada a ruta para cargar combobox con datos de tabla grados
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
        
          $('#grado_nota').empty();//limpia el combobox
          var datos ="<option value='' disabled selected>Grado</option>";
          data.forEach(element => { //ciclo para recorrer el arreglo de grados
              //variable para asignarle los valores al combobox
             datos+='<option  value="'+element.id+'">'+element.Grado+'</option>';
          });
          $('#grado_nota').append(datos);//ingresa valores al combobox
          
      }
    });//Fin ajax combobox Grado

    
    $.ajax({
        type: 'POST',
        url: 'cargargrupos/grupo', // llamada a ruta para cargar combobox con datos de tabla grupos
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
        
          $('#grupo_nota').empty();//limpia el combobox
          var datos ="<option value='' disabled selected>Grupo</option>";
          data.forEach(element => { //ciclo para recorrer el arreglo de grupos
              //variable para asignarle los valores al combobox
             datos+='<option  value="'+element.id+'">'+element.Grupo+'</option>';
          });
          $('#grupo_nota').append(datos);//ingresa valores al combobox
          
      }
    });//Fin ajax combobox Grupo
});
function Mostar_Notas()
{
  
    var año=$('#año_oferta').val();
    var id_grado=$('#grado_nota').val();
    var id_grupo=$('#grupo_nota').val();

    if($('#grado_nota').val()!=null && $('#grupo_nota').val()!=null)
    {

        $.ajax({ //ajax Mostra Notas
            type: 'POST',
            url: '/notas/cargar/'+año+'/'+id_grado+'/'+id_grupo, // llamada a ruta para cargar combobox con datos de tabla grupos
            dataType: "JSON", // tipo de respuesta del controlador
            success: function(data){ 
            
             if(data==0)
             {
                var error="No se a encontrado ningun registro"
                $('#mensaje').text(error);   //manda el error a la modal
                $("#Mensaje-error").modal("show"); //abre modal de error
                $("#Mensaje-error").fadeTo(2900,500).slideUp(450,function(){// cierra la modal despues del tiempo determinado  
                    $("#Mensaje-error").modal("hide"); // cierra modal error
                    } );
    
             }
              
          }
        });//Fin ajax Mostra Notas

    }
    else
    {
        var error="Favor seleccione los Datos de los Desplegables"
        $('#mensaje').text(error);   //manda el error a la modal
        $("#Mensaje-error").modal("show"); //abre modal de error
        $("#Mensaje-error").fadeTo(2900,500).slideUp(450,function(){// cierra la modal despues del tiempo determinado  
            $("#Mensaje-error").modal("hide"); // cierra modal error
            } );

    }


}



