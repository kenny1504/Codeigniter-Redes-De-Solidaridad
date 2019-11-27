$(document).ready(function () {
    var contenido_fila;
    var contenido_fila2;
    var coincidencias;
    var coincidencias2;
    var exp;
//Este metodo es el evento keyup del campo de búsqueda
$("#buscarE").keyup(function () { //captura los valores del imput segun escriba
if ($(this).val().length >= 1) //verifica si no esta vacio
    filtrar($(this).val()); //invoca al metodo filtrar
else
    mostrarfilas(); //invoca al metodo para mostrar filas
});

function filtrar(cadena) { //busca coincidencias 
$("#estudiantes tbody tr").each(function () { //recorre todas las filas de las tablas
    //$(this).removeClass('muestra'); //remueve la clase mostrar
    contenido_fila = $(this).find('td:eq(0)').text(); //verifica si el contenido de la celdas en la columna 0
    contenido_fila2 = $(this).find('td:eq(1)').text();
    exp = RegExp(cadena, 'gi'); //expresion regular
    coincidencias = contenido_fila.match(exp); // establece el valor obtenido en la expresion regular
    coincidencias2 = contenido_fila2.match(exp);
    if (coincidencias == null && coincidencias2==null) //Si No encuentro coincidencias de búsqueda
        $(this).addClass('oculta');
})
};
//Este metodo se invoca cuando el campo de búsqueda está vacío, o quiero mostrar
//todos los campos
function mostrarfilas() {
$("#estudiantes tbody tr").each(function () {
    $(this).removeClass('oculta');
    //$(this).addClass('muestra');
})
};
}) //Aquí termina el document.ready

var n=0;
$(".mostrar").click(function() { // ajax para eliminar un grado
    var iden=$(this).attr("data-id"); // captura el id_grado "id" del grado
        var id="#"+iden;
        var id2="#"+iden+"a";
    if(n==0){
      $(id).removeClass('hidden');
      $(id2).addClass('hidden');
      n=1; // oculta error del servidor(validacion-servidor)
    }
    else{
        $(id2).removeClass('hidden');
        $(id).addClass('hidden'); // oculta error del servidor(validacion-servidor)
        n=0;
    }
}); 
$(".ocultar").click(function() { // ajax para eliminar un grado
    var iden=$(this).attr("data-id"); // captura el id_grado "id" del grado
    var id="#"+iden;
  $(id).addClass('hidden'); // oculta error del servidor(validacion-servidor)
}); 


