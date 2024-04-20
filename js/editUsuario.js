$(document).ready(function () {
    $('#btnEditar').on('click', function (e) {
        e.preventDefault(); 


        var formData = {
            id: document.getElementById('idUsuario').value,
            username: document.getElementById('username').value,
            nombre: document.getElementById('nombre').value,
            apellido1: document.getElementById('primerApellido').value,
            apellido2: document.getElementById('segundoApellido').value,
            correo: document.getElementById('correo').value,
            telefono: document.getElementById('telefono').value,
            password: document.getElementById('password').value
        };
        
        console.log('Datos:', formData);
        
        // Datos hacia PHP mediante AJAX
        $.ajax({
            url: 'DAL/editarUsuario.php',
            method: 'POST',
            data: formData,
            success: function (response) {
                edicionExitosa(response);
                console.log(response);
            },
            error: function (xhr, status, error) {
                edicionFallida(error);
            }
        });
    });
});

function edicionExitosa(TextoJSON) {
    $("#pnlInfo").dialog();
    $("#blInfo").html('<p>' + TextoJSON + '</p>');
    // Redirigir a la página de detalles del usuario después de 2 segundos
    setTimeout(function () {
        console.log("Redirigiendo a la página de detalles del usuario");
        window.location.href = "index.php";
    }, 2000);
}

function edicionFallida(TextoJSON) {
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrió un error en el servidor.</p>' + TextoJSON.responseText);
};