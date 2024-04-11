
$(document).ready(function () {
    cargaProducto();

    $('#btnEditar').on('click', function() {
        // Formato src imagen
        const rutaimgP = $('#imagenProducto').attr('src');
        const rutaArrayP = rutaimgP.split('/');
        const imagenNombre = rutaArrayP[rutaArrayP.length - 1];
        //Formatear nombre imagen cargada
        const rutaimg = $('#ruta_imagen').val();            
        const rutaArray = rutaimg.split('\\'); 
        const imagenSeleccionada = rutaArray[rutaArray.length - 1];
        // Obtener datos del formulario
        const formData = new FormData();
        formData.append('idProducto', $('#idProducto').val());
        formData.append('nombre', $('#nombre').val());
        formData.append('descripcion', $('#descripcion').val());
        formData.append('peso', $('#peso').val());
        formData.append('precio', $('#precio').val());
        formData.append('existencias', $('#existencias').val());
        formData.append('activo', $('#activo').val());
        formData.append('imagenArchivo', $('#ruta_imagen')[0].files[0]);
        formData.append('imagen', imagenSeleccionada);
        formData.append('imagenNombre', imagenNombre)
        // Datos hacia PHP mediante AJAX
        $.ajax({
            url: 'DAL/editaProducto.php',
            method: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(response) {
                insercionExitosa(response);
                //window.location.replace("productosAdmin.html");
            },
            error: function(xhr, status, error) {
                insercionFallida(error);
            }
        });
        
    });

})


// Función AJAX producto editar
function cargaProducto() {
    try{
        $.ajax({
            url: 'DAL/getProducto.php?idProducto=' + $("#idProducto").val()
        })
            .done(function (data){
                productoDatos(data);
            });
    
    }catch (err) {
        alert(err);
    }
}


// Función llenar datos de producto
function productoDatos(TextoJSON) {
    var ObjetoJSON = JSON.parse(TextoJSON);

    // Llenar los campos del formulario
    $('#nombre').val(ObjetoJSON.nombre);
    $('#descripcion').val(ObjetoJSON.descripcion);
    $('#peso').val(ObjetoJSON.peso);
    $('#precio').val(ObjetoJSON.precio);
    $('#existencias').val(ObjetoJSON.existencias);
    $('#activo').val(ObjetoJSON.activo);
    // Imagen
    var rutaImagen = '/Sucato/Imagenes/' + ObjetoJSON.ruta_imagen;
    $('#imagenProducto').attr('src', rutaImagen);
}


// Función cargar imagen seleccionada
function cargaIMG(file) {
    if (file.files && file.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagenProducto')
                .attr('src', e.target.result)
                .height(200);
        };
        reader.readAsDataURL(file.files[0]);
    }
}


function insercionFallida(TextoJSON){
    $("#pnlMensaje").dialog();
    $("#pnlMensaje").html('<p>Ocurrio un error en el servidor ..</p>' + TextoJSON.responseText);
};


function insercionExitosa(TextoJSON){
    $("#pnlInfo").dialog();
    $("#blInfo").html('<p>' + TextoJSON + '</p>');
};