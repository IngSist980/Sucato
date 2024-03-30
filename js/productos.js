
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



// Función ingresa registros de productos
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
                    html += "<a class='btn btn-success text-uppercase' onclick='addCarrito(" + i + ")' >" + "Agregar al Carrito" + "</a>";

                    html += "<input id='producto-id-" + i + "' name='idProducto' hidden readonly value='" + ObjetoJSON[i].id_producto + " '>";
                    html += "<input id='existencias-producto-" + i + "' name='existencias' hidden readonly value='" + ObjetoJSON[i].existencias +" '>";
                    html += "<input id='precio-producto-" + i + "' name='precio' hidden readonly value='" + ObjetoJSON[i].precio + "'>";
                    html += "<input id='nombre-producto-" + i + "' name='nombre-detalle' hidden readonly value='" + ObjetoJSON[i].nombre + "'>";
                    html += "<img id='img-producto-" + i + "' name='imagen' hidden src='" + 'Imagenes/' + ObjetoJSON[i].ruta_imagen + "'>";

                    html += "</div>";
            html += "</div>";
        html += "</div>";
    }

    // agregar html al div productos
    $("#productos .row").append(html);
}


// Función añade producto al carrito
const addCarrito = (i) => {
    try{
        // Formato src imagen
        const rutaimg = $('#img-producto-' + i).attr('src');
        const rutaArray = rutaimg.split('/');
        const imagen = rutaArray[rutaArray.length - 1];
        // Obtención datos form
        const idProducto = $('#producto-id-' + i).val();
        const nombre = $('#nombre-producto-' + i).val();
        const precio = $('#precio-producto-' + i).val();
        const existencias = $('#existencias-producto-' + i).val();

        const producto = {
            idProducto: idProducto,
            imagen: imagen,
            nombre: nombre,
            precio: precio,
            existencias: existencias
        };

        $.ajax({
            url: 'DAL/addProductoCarrito.php',
            method: 'POST',
            data: producto
        })
            .done(function (data){
                if (data && !data.error) {
                    ingresoCorrecto();
                    console.log(data);
                } else {
                    alert('Error al agregar el producto al carrito.');
                }
            });
    
    }catch (err) {
        alert(err);
    }
} 


const ingresoCorrecto = () => {
    // Mensaje ingreso correcto
    const html = "<div id='mensaje-exito-principal' class='d-flex justify-content-center'><p class='lead text-white bg-success p-2 text-center fs-5 w-50'>Producto agregado al carrito</p></div>";
    $('#contenedor-principal').before(html); 

    setTimeout(() => {
        $('#mensaje-exito-principal').detach();
    }, 2000);
}
