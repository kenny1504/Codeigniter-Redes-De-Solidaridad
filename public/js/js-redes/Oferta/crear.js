$("#cargar").click(function() { //ajax para cargar combobox Grados
    $.ajax({
        type: 'POST',
        url: 'cargargrados/asignatura', // llamada a ruta para cargar combobox con datos de tabla grados
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
        
          $('#Grado').empty();//limpia el combobox
          data.forEach(element => { //ciclo para recorrer el arreglo de grados
              //variable para asignarle los valores al combobox
            var datos='<option style="color: blue;" value="'+element.id+'">'+element.Grado+'</option>';

              $('#Grado').append(datos);//ingresa valores al combobox
          });
          
      }
    });//Fin ajax combobox Grado

    $.ajax({
        type: 'POST',
        url: 'cargarsecciones/seccion', // llamada a ruta para cargar combobox con datos de tabla secciones
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
        
          $('#Seccion').empty();//limpia el combobox
          data.forEach(element => { //ciclo para recorrer el arreglo de secciones
              //variable para asignarle los valores al combobox
            var datos='<option style="color: blue;" value="'+element.id+'">'+element.Codigo+'</option>';

              $('#Seccion').append(datos);//ingresa valores al combobox
          });
          
      }
    });//Fin ajax combobox Seccion

    $.ajax({
        type: 'POST',
        url: 'cargargrupos/grupo', // llamada a ruta para cargar combobox con datos de tabla grupos
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
        
          $('#Grupo').empty();//limpia el combobox
          data.forEach(element => { //ciclo para recorrer el arreglo de grupos
              //variable para asignarle los valores al combobox
            var datos='<option style="color: blue;" value="'+element.id+'">'+element.Grupo+'</option>';

              $('#Grupo').append(datos);//ingresa valores al combobox
          });
          
      }
    });//Fin ajax combobox Grupo

    $.ajax({
        type: 'POST',
        url: 'cargardoc/docente', // llamada a ruta para cargar combobox con datos de tabla docentes
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
        
          $('#Docente').empty();//limpia el combobox
          data->getResultArray().foreach(element => { //ciclo para recorrer el arreglo de docentes
              //variable para asignarle los valores al combobox
            var datos='<option style="color: blue;" value="'+element.id+'">'+element.Nombre+'</option>';

              $('#Docente').append(datos);//ingresa valores al combobox
          });
          
      }
    });//Fin ajax combobox Docentes
});
