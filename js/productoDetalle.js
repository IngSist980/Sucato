
$(document).ready(function () {
    cargaProducto();
})


// Función AJAX producto detalle
function cargaProducto() {
    try{
        $.ajax({
            url: 'DAL/getProducto.php?idProducto=' + $("#idProducto").val()
        })
            .done(function (data){
                ProductoDetalleJson(data);
            });
    
    }catch (err) {
        alert(err);
    }
}


function ProductoDetalleJson(TextoJSON) {
    var ObjetoJSON = JSON.parse(TextoJSON);

    var html = '';

    $('#img-container #img-producto').attr('src', `Imagenes/${ObjetoJSON.ruta_imagen}`);
    $('#nombre-producto').text(ObjetoJSON.nombre);
    html += "<h3 class='text-uppercase fw-bold fs-4 mb-4'>" + "Detalles" + "</h3>";
    html += "<p class='lead'>" + ObjetoJSON.descripcion + "</p>";
    html += "<p class='lead'> ₡ " + ObjetoJSON.precio + "</p>";
    html += "<p class='lead'> Peso: " + ObjetoJSON.peso + "</p>";
    html += "<p class='lead'> Stock: " + ObjetoJSON.existencias + "</p>";

    $('#info-container').html(html); 

}

