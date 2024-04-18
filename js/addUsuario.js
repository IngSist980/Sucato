$(document).ready(function() {
    $('#btnRegistrarse').on('click', function() {
        // Obtener datos del formulario
        const formData = new FormData();
        formData.append('username', $('#username').val());
        formData.append('password', $('#password').val());
        formData.append('nombre', $('#nombre').val());
        formData.append('primerApellido', $('#primerApellido').val());
        formData.append('segundoApellido', $('#segundoApellido').val());
        formData.append('correo', $('#correo').val());
        formData.append('telefono', $('#telefono').val());
        formData.append('tipoRol', 'Cliente');

        // Datos hacia PHP mediante AJAX
        $.ajax({
            url: 'DAL/registrarUsuario.php',
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


function insercionExitosa(TextoJSON) {
    $("#pnlInfo").dialog();
    $("#blInfo").html('<p>' + TextoJSON + '</p>');
};

function insercionFallida(TextoJSON) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrió un error en el servidor ..</p>' + TextoJSON.responseText);
};

function LimpiaCampos() {
    $('#username').val('');
    $('#password').val('');
    $('#nombre').val('');
    $('#primerApellido').val('');
    $('#segundoApellido').val('');
    $('#correo').val('');
    $('#telefono').val('');
};
