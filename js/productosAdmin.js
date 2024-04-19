
$(document).ready(function () {
    cargaProductos();
})

// Función AJAX productos
function cargaProductos() {
    try{
        $.ajax({
            url: 'DAL/productosAdmin.php'
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
        html += "<tr class='w-100' id='tr" + ObjetoJSON[i].id_producto + "'>";
        html += "<td>" + (i+1) + "</td>"
        html += "<td>"  + ObjetoJSON[i].nombre + "</td>"
        html += "<td>"  + ObjetoJSON[i].precio + "</td>"
        html += "<td>"  + ObjetoJSON[i].existencias + "</td>"
        html += "<td>"  + ObjetoJSON[i].peso + "</td>"
        html += "<td>";
        if (ObjetoJSON[i].activo != 0) {
            html += "Sí";
        } else {
            html += "No";
        }
        html += "</td>";
        html += '<td><a id="idProducto" href="editarProducto.php?idProducto=' + ObjetoJSON[i].id_producto + '" class="text-primary text-decoration-none">Editar</a></td>';
        //html += '<td><button onclick="eliminarProd(' + ObjetoJSON[i].id_producto + ')" class="text-danger btn btn-danger text-white">Eliminar</button></td>';
        html += '<td><button onclick="eliminarProd(' + ObjetoJSON[i].id_producto + ')" class="btn text-danger border-0"><i class="fas fa-solid fa-trash"></i></button></td>';

        html += "</tr>"
    }

    // agregar html al div productos
    $("#tabla #fila").append(html);
}


function eliminarProd(idProducto) {
    $.ajax({
        url: 'DAL/eliminaProducto.php?idProducto=' + idProducto,
        method: 'POST',
        processData: false,
        contentType: false,
        success: function(response) {
            let respuesta = JSON.parse(response)
            alertaEliminado(respuesta);
            //console.log(respuesta);
        },
        error: function(xhr, status, error) {
            insercionFallida(false);
            console.log(error);
        }
    });
}


const alertaEliminado = (respuesta) => {
    let html = ' ';

    if(!respuesta.eliminado){
        html = "<div id='mensaje-exito' class='d-flex justify-content-center'><p class='lead text-white bg-danger p-2 text-center fs-5 w-50'>Error al eliminar, intente de nuevo</p></div>";
    }else{
        $('#tr' + respuesta.idProducto).remove();
        html = "<div id='mensaje-exito' class='d-flex justify-content-center'><p class='lead text-white bg-success p-2 text-center fs-5 w-50'>Eliminado correctamente</p></div>";
    }
    
    $('#tabla').before(html); 

    setTimeout(() => {
        $('#mensaje-exito').detach();
        // setTimeout(() => {
        //     window.location.replace("productosAdmin.html");
        // }, 1000);
    }, 3000);

}