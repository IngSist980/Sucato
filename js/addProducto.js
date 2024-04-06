
$(document).ready(function() {

    $('#btnCrear').on('click', function() {
        //Formatear nombre imagen
        const rutaimg = $('#ruta_imagen').val();
        const rutaArray = rutaimg.split('\\'); 
        const imagenSeleccionada = rutaArray[rutaArray.length - 1];
        // Obtener datos del formulario
        const formData = new FormData();
        formData.append('idCategoria', $('#categoria').val());
        formData.append('nombre', $('#nombre').val());
        formData.append('descripcion', $('#descripcion').val());
        formData.append('peso', $('#peso').val());
        formData.append('precio', $('#precio').val());
        formData.append('existencias', $('#existencias').val());
        formData.append('activo', $('#activo').val());
        formData.append('imagenArchivo', $('#ruta_imagen')[0].files[0]);
        formData.append('imagen', imagenSeleccionada);

        // Datos hacia PHP mediante AJAX
        $.ajax({
            url: 'DAL/insertaProducto.php',
            method: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(response) {
                insercionExitosa(response);
                LimpiaCampos();
            },
            error: function(xhr, status, error) {
                insercionFallida(error);
            }
        });
    });
});


function insercionExitosa(TextoJSON){
    $("#pnlInfo").dialog();
    $("#blInfo").html('<p>' + TextoJSON + '</p>');
};

function insercionFallida(TextoJSON){
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor ..</p>' + TextoJSON.responseText);
};

function LimpiaCampos() {
    $('#nombre').val('');
    $("#descripcion").val('');
    $("#peso").val('');
    $("#precio").val('');
    $("#existencias").val('');
    $("#activo").val(0).trigger('change');
    $("#ruta_imagen").val('');
};
