
$(document).ready(function () {
    cargaProductos();
})

// Función AJAX productos
function cargaProductos() {
    try{
        $.ajax({
            url: 'DAL/getProductos.php'
        })
            .done(function (data){
                ProductosJson(data);
            });
    
    }catch (err) {
        alert(err);
    }
}



// Función ingresa registros de productos en JSON
function ProductosJson(TextoJSON) {
  
    var ObjetoJSON = JSON.parse(TextoJSON);

    var html = ""; 

    for (var i = 0; i < ObjetoJSON.length; i++) {
        // genera HTML dinámicamente
        html += "<div class='col-md-6 col-lg-3 mb-4'>"; 
            html += "<div class='card h-100 card-producto' >";
                html += "<img class='card-img-top' alt='imagen' style='height: 300px; object-fit: scale-down;' src='imagenes/" + ObjetoJSON[i].ruta_imagen + "'>";
                html += "<div class='card-body d-flex flex-column'>";
                    html += "<h5 class='card-title flex-grow-1 text-center text-uppercase'>" + ObjetoJSON[i].nombre + "</h5>";
                    html += "<h5 class='card-text flex-grow-1 text-center'>" + '₡ ' + ObjetoJSON[i].precio + "</h5>";
                    html += '<a id="idProducto" href="productoDetalle.php?idProducto=' + ObjetoJSON[i].id_producto + '" class="text-primary text-center pb-4">Más Información</a>';
                    html += "<a href='#' class='btn btn-success text-uppercase'>" + "Agregar al Carrito" + "</a>";
                html += "</div>";
            html += "</div>";
        html += "</div>";
    }

    // agregar html al div productos
    $("#productos .row").append(html);
}


