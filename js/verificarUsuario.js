

//hasta el momento esto es inservible e innecesario
$(document).ready(function () {
    cargaUsuario();

})


// Función AJAX producto detalle
function cargaUsuario() {
    try{
        $.ajax({
            url: 'DAL/getUsuario.php?id_usuario=' + $("#id_usuario").val()
        })
            .done(function (data){
                UsuarioDetalleJson(data);
            });
    
    }catch (err) {
        alert(err);
    }
}


function UsuarioDetalleJson(TextoJSON) {
    var ObjetoJSON = JSON.parse(TextoJSON);

    var html = '';

    $('#img-container #img-producto').attr('src', `Imagenes/${ObjetoJSON.ruta_imagen}`);
    $('#nombre-producto').text(ObjetoJSON.nombre);
    html += "<h3 class='text-uppercase fw-bold fs-4 mb-4'>" + "Detalles" + "</h3>";
    html += "<p class='lead'>" + ObjetoJSON.descripcion + "</p>";




    $('#info-container').html(html); 

}


