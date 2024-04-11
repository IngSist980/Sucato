
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
        html += "<tr class='w-100'>"
        html += "<td>" + i + "</td>"
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

        html += "</tr>"
    }

    // agregar html al div productos
    $("#tabla #fila").append(html);
}

