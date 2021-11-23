var titulo = document.getElementById("tituloAnuncio").value;
var descripcion = document.getElementById("descAnuncio").value;
var precio = document.getElementById("precioAnuncio").value;
var categoria = document.getElementById("selCategorias").value;
var fecha = new Date();
var pathFoto = document.getElementById("").value;

var anuncio = new Anuncio(titulo, descripcion, precio, categoria, fecha, pathFoto);