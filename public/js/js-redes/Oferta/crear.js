$('#datepickerOferta').datepicker({ //sirve para mostrar Datepicker
  autoclose: true
})

$("#cargar").click(function() { //ajax para cargar combobox Grados
    $.ajax({
        type: 'POST',
        url: 'cargargrados/oferta', // llamada a ruta para cargar combobox con datos de tabla grados
        dataType: "JSON", // tipo de respuesta del controlador
        success: function(data){ 
        
          $('#Grado').empty();//limpia el combobox
          data.forEach(element => { //ciclo para recorrer el arreglo de grados
              //variable para asignarle los valores al combobox
            var datos='<option  value="'+element.id+'">'+element.Grado+'</option>';

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
            var datos='<option  value="'+element.id+'">'+element.Codigo+'</option>';

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
            var datos='<option  value="'+element.id+'">'+element.Grupo+'</option>';

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
          var datos="";
          for(var i=0; i<data.length;i++){
            datos+='<option  value="'+data[i].id+'">'+data[i].Nombre+'</option>';
          }
          $('#Docente').append(datos);//ingresa valores al combobox
      }
    });//Fin ajax combobox Docentes
});

$("#nueva_oferta").click(function() { // ajax para guardar en la tabla oferta

  $.ajax({
    type: 'POST', 
    url: 'guardar/oferta', // llamada a ruta para cargar combobox con datos de tabla materia
    data: $('#ingresar_oferta').serialize(), // manda el form donde se encuentra la modal dataType: "JSON", // tipo de respuesta del controlador
    dataType: "JSON", // tipo de respuesta del controlador
    success: function(data){ 
      if(data==1) // si la aun no se asigna  a ese grado manda mensaje de exito
      {
        //$("#nueva_oferta").modal("hide"); // cierra modal confirmar
        $("#exito").modal("show"); //abre modal de exito
        $("#exito").fadeTo(2000,500).slideUp(450,function(){   // cierra la modal despues del tiempo determinado  
                 $("#exito").modal("hide"); // cierra modal exito
                 } );
      }
      if(data==100) // si la materia ya existe se manda mensaje de error
      {
        var error="La Materia que intenta ingresar ya esta asignada a este grado"
        $('#mensaje').text(error);   //manda el error a la modal
        $("#Mensaje-error").modal("show"); //abre modal de error
        $("#Mensaje-error").fadeTo(2000,500).slideUp(450,function(){// cierra la modal despues del tiempo determinado  
                 $("#Mensaje-error").modal("hide"); // cierra modal error
                 } );
      }      
  }   
});//Fin ajax guardar materia asignada
});