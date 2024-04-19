
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
       });
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
                //console.log(flag + ' ' + monto + ' ' + respuesta.username);
                //imprimirFactura(flag, monto);
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