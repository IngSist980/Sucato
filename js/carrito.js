
$(document).ready(function () {
    cargaCarrito();

    $("#btnEliminar").on("click", function () {
        const carrito = JSON.parse(sessionStorage.getItem("carrito"));
        if (carrito && carrito.length > 0) {
            sessionStorage.clear(); 
            location.reload();
        }else{
            const alertas = document.querySelector('.alertas');
            let html = '<div class="container">';
            html += `<p class="bg-danger text-white m-0 text-center p-2"><strong>EL CARRITO ESTÁ VACÍO</strong></p>`;
            alertas.innerHTML = html;
        }
        
    })

    $("#btnFinalizar").on("click", function () {
        guardarFactura();
    })
    
})


function cargaCarrito() {
   // Cargar cada elemento del sessionStorage
   const carrito = JSON.parse(sessionStorage.getItem("carrito"));
   const contenedorProductos = document.querySelector("#contenedor-productos");

   if(carrito && carrito.length > 0){
       contenedorProductos.innerHTML = '';
       let monto = 0; 
       carrito.forEach(producto => {
           const productoHTML = `
               <div class="row mb-4 d-flex justify-content-between align-items-center">
                   <div class="col-md-2 col-lg-2 col-xl-2">
                       <img src="Imagenes/${producto.imagen}" class="img-fluid rounded-3 mh-25" alt="${producto.nombre}">
                   </div>
                   <div class="col-md-3 col-lg-3 col-xl-3">
                       <h6 class="text-black mb-0">${producto.nombre}</h6>
                   </div>
                   <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                       <!-- Aquí puedes agregar más detalles del producto si lo deseas -->
                   </div>
                   <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                       <h6 class="mb-0">₡ ${producto.precio}</h6>
                   </div>
                   <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                       <a href="#" class="text-muted"><i class="fas fa-times"></i></a>
                   </div>
               </div>
           `;
           // Insertar html productos
           contenedorProductos.innerHTML += productoHTML;

           monto = monto + parseFloat(producto.precio);
       });
       i = carrito.length;

       // Mostrar monto y cantidad en HTML
       $('#cantidadArticulos').text('Articulos: ' + i);
       $('#montoFinal').text('₡' + monto);

   } else {
        contenedorProductos.innerHTML = "<p>CARRITO VACÍO</p>";
   }
}


function guardarFactura() {
    // Cargar cada elemento del session storage
    const carrito = JSON.parse(sessionStorage.getItem("carrito"));
    if (carrito && carrito.length > 0) {
        $.ajax({
            url: 'DAL/factura.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(carrito),
            success: function(response) {
                let respuesta = JSON.parse(response);
                const monto = respuesta.monto;
                const flag = respuesta.flag;
                const name = respuesta.username;
                //console.log(flag + ' ' + monto + ' ' + respuesta.username);
                imprimirFactura(flag, monto, name);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    } else {
        console.log('El carrito está vacío');
        const alertas = document.querySelector('.alertas');
        let html = '<div class="container">';
        html += `<p class="bg-danger text-white m-0 text-center p-2"><strong>EL CARRITO ESTÁ VACÍO</strong></p>`;
        alertas.innerHTML = html;
    }
}


// Impresión de factura
function imprimirFactura(flag, monto, usuario) {
    const alertas = document.querySelector('.alertas');
    let html = '<div class="container">';

    if (!flag && usuario == null) {
        //console.log('Error al generar factura');
        html += `<p class="bg-danger text-white m-0 text-center p-2"><strong>ERROR! DEBE INICIAR SESIÓN</strong></p>`;
        alertas.innerHTML = html;
    } else {
        // Limpiar contenido modal
        const modalDialog = document.querySelector('.modal-dialog');
        modalDialog.innerHTML = '';

        // HTML factura
        let facturaHTML = `
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title">Factura</h5>
                </div>
                <div class="modal-body">
                    <p><strong>Usuario:</strong> ${usuario}</p>
                    <p><strong>Productos:</strong></p>
                    <ul>`;
        
        // Obtener carrito e imprimir cada producto
        const productos = JSON.parse(sessionStorage.getItem('carrito'));
        productos.forEach(producto => {
            facturaHTML += `<li>${producto.nombre}: $${producto.precio}</li>`;
        });

        facturaHTML += `</ul>
                    <p><strong>Monto Final:</strong> $${monto}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>`;

        modalDialog.innerHTML = facturaHTML;

        $('#contenedor-productos').remove();
        // Abrir modal factura
        $('#facturaModal').modal('show');
        // Limpiar session storage
        sessionStorage.clear(); 
    }
}
