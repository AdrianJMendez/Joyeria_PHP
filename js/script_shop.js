let totalMonto = 0;

function cargarProductos() {
    const productos = JSON.parse(localStorage.getItem('carrito')) || [];
    const contenedor = document.getElementById('products');
    contenedor.innerHTML = ''; // Limpiar el contenedor antes de agregar productos
    totalMonto = 0; // Reiniciar el total

    productos.forEach(producto => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>
                <div class="media">
                    <div class="d-flex">
                        <img src="${producto.imagen_url}" alt="${producto.nombre}" style="width: 80px; height: 80px; object-fit: cover;">
                    </div>
                    <div class="media-body">
                        <p>${producto.nombre} ${producto.material}</p>
                    </div>
                </div>
            </td>
            <td>
                <h5>$${parseFloat(producto.precio).toFixed(2)}</h5>
            </td>
            <td>
                <div class="product_count">
                    <input type="text" name="qty" maxlength="12" value="${producto.cantidad}" title="Cantidad:"
                        class="input-text qty" readonly>
                    <button onclick="var result = this.previousElementSibling; var qty = parseInt(result.value); if(!isNaN(qty)) result.value = qty + 1; return false;"
                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                    <button onclick="var result = this.previousElementSibling.previousElementSibling; var qty = parseInt(result.value); if(!isNaN(qty) && qty > 0) result.value = qty - 1; return false;"
                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                </div>
            </td>
            <td>
                <h5>$${(parseFloat(producto.precio) * parseInt(producto.cantidad)).toFixed(2)}</h5>
            </td>
        `;

        contenedor.appendChild(fila);

        // Calcular el total
        totalMonto += parseFloat(producto.precio) * parseInt(producto.cantidad);
    });

    // Guardar el total en localStorage
    localStorage.setItem('total', totalMonto.toFixed(2));

    // Actualizar el monto total en el HTML
    document.getElementById('total').innerHTML = `<strong>$${totalMonto.toFixed(2)}</strong>`;
}

// Llamar a la función para cargar los productos cuando se cargue la página
cargarProductos();




//Limpiar Orden
function eliminarOrden() {
    // Eliminar el carrito de localStorage
    localStorage.removeItem('carrito');
    localStorage.removeItem('total');

    // Redirigir a la página de inicio
    window.location.href = 'index.php';
}


function guardarOrden() {
    // Redirigir a la página de inicio
    window.location.href = 'checkout.php';
}

function submitOrder() {
    // Obtener los valores de los inputs
    const id_usuario = document.getElementById('id_usuario').value;
    const fecha = document.getElementById('fecha').value;
    
    // Obtener el total del localStorage
    const total = localStorage.getItem('total');
    
    // Validar que se tengan los datos necesarios
    if (!id_usuario || !fecha || !total) {
        alert('Por favor, rellene todos los campos.');
        return;
    }

    // Crear los datos para la orden
    const data = {
        id_usuario: id_usuario,
        fecha: fecha,
        total: total
    };

    // Guardar la orden en localStorage para comprobar que se está generando correctamente
    localStorage.setItem('ultima_orden', JSON.stringify(data));
    localStorage.setItem('id_usuario', id_usuario);
    
    // Mostrar la orden guardada en localStorage
    console.log('Orden guardada en localStorage:', JSON.parse(localStorage.getItem('ultima_orden')));

    // Hacer la petición a la API
    fetch('http://localhost/Relojeria/Controller/ordenes.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Orden creada con éxito:', data);
        alert('Orden creada con éxito.');
        
        // Llamar a la función createOrderDetails con el id_orden de la respuesta
        createOrderDetails(data.id_orden);
        localStorage.setItem('id_orden', data.id_orden);
        //Redirigir y llamar a la funcion para obtener tarjeta
       window.location.href = `form1.php`;
        
    })
    .catch((error) => {
        console.error('Error al crear la orden:', error);
        alert('Hubo un error al crear la orden.');
    });

    
}


function createOrderDetails(id_orden) {
    // Obtener el carrito desde localStorage
    const carrito = JSON.parse(localStorage.getItem('carrito'));

    // Validar que se tengan los datos necesarios
    if (!id_orden || !carrito || carrito.length === 0) {
        alert('No hay datos suficientes para crear los detalles de la orden.');
        return;
    }

    // Crear los detalles de la orden
    carrito.forEach(item => {
        const detalleData = {
            id_orden: id_orden,
            id_reloj: item.id_reloj,
            cantidad: item.cantidad
        };

        // Hacer la petición a la API para cada detalle de la orden
        fetch('http://localhost/Relojeria/Controller/ordenDetalle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(detalleData),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Detalle de orden creado con éxito:', data);
        })
        .catch((error) => {
            console.error('Error al crear el detalle de la orden:', error);
        });
    });

    alert('Detalles de la orden creados con éxito.');
}


