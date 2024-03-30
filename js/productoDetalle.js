
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
    html += "<input id='existencias' name='existencias' hidden readonly value='" + ObjetoJSON.existencias + " '>";
    html += "<input id='precio' name='precio' hidden readonly value='" + ObjetoJSON.precio + "'>";
    html += "<input id='nombre-detalle' name='nombre-detalle' hidden readonly value='" + ObjetoJSON.nombre + "'>";

    html += "<button id='btnAddCarrito' type='button' class='btn btn-success  text-uppercase w-75 mt-2' onclick='addCarrito()'>Agregar al Carrito</button>";

    $('#info-container').html(html); 

}


// Función añade producto al carrito
const addCarrito = () => {
    try{
        // Formato src imagen
        const rutaimg = $('#img-producto').attr('src');
        const rutaArray = rutaimg.split('/');
        const imagen = rutaArray[rutaArray.length - 1];
        // Obtención datos form
        const idProducto = $('#idProducto').val();
        const nombre = $('#nombre-detalle').val();
        const precio = $('#precio').val();
        const existencias = $('#existencias').val();

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
    const html = "<div id='mensaje-exito' class='d-flex justify-content-center'><p class='lead text-white bg-success p-2 text-center fs-5 w-50'>Producto agregado al carrito</p></div>";
    $('#nombre-producto').before(html); 

    setTimeout(() => {
        $('#mensaje-exito').detach();
    }, 2000);
}