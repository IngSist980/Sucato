
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
                    html += '<a id="idProducto" href="productoDetalle.php?idProducto=' + ObjetoJSON[i].id_producto + '" class="text-primary text-center pb-4 text-decoration-none">Más Información</a>';
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
            idProducto,
            imagen,
            nombre,
            precio,
            existencias
        };
        
        flag = false;

        let carrito = JSON.parse(sessionStorage.getItem('carrito')) || [];

        if(producto != null && existencias > 0){
            carrito.push(producto);
    
            sessionStorage.setItem('carrito', JSON.stringify(carrito));
    
            flag = true;
        }

        mensajeIngreso(flag);
        
        /* Código anterior
        $.ajax({
            url: 'DAL/addProductoCarrito.php',
            method: 'POST',
            data: producto
        })
            .done(function (data){
                let ObjetoJSON = JSON.parse(data);
                ObjetoJSON.success ? mensajeIngreso(true) : mensajeIngreso(false);
            });
        */
    }catch (err) {
        alert(err);
    }
} 


const mensajeIngreso = (flag) => {
    let html = ' ';
    if(flag){
        // Mensaje ingreso correcto
        html = "<div id='mensaje-exito-principal' class='d-flex justify-content-center'><p class='lead text-white bg-success p-2 text-center fs-5 w-50'>Producto ingresado al carrito</p></div>";
        
    }else{
        // Mensaje error
        html = "<div id='mensaje-exito-principal' class='d-flex justify-content-center'><p class='lead text-white bg-danger p-2 text-center fs-5 w-50'>Error! Producto no disponible</p></div>";
    }

    $('.principal-cont').before(html); 

    setTimeout(() => {
        $('#mensaje-exito-principal').detach();
    }, 4000);
}
