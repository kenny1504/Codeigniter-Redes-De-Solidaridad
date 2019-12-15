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



