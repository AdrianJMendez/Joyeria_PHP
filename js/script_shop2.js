function obtenerTarjeta(id_usuario) {
    fetch(`http://localhost/Relojeria/Controller/tarjetas.php?id_usuario=${id_usuario}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                // Guardar id_tarjeta en localStorage
                localStorage.setItem('id_tarjeta', data[0].id_tarjeta);
                localStorage.setItem('numero_tarjeta', data[0].numero_tarjeta);

                // Mostrar el número de tarjeta en el input
                document.getElementById('tarjeta').value = data[0].numero_tarjeta;
                document.getElementById('aceptarPagoBtn').style.display = 'inline-block';
            } else {
                document.getElementById('tarjeta').value = 'No tienes metodos de pago habilitados.';
                document.getElementById('aceptarPagoBtn').style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('tarjeta').value = 'Error al obtener la tarjeta.';
            document.getElementById('aceptarPagoBtn').style.display = 'none';
        });
}





function cargarTarjeta() {
    const id_usuario = localStorage.getItem('id_usuario');
    if (id_usuario) {
        obtenerTarjeta(id_usuario);
    }
}

cargarTarjeta();


function crearFactura() {
    // Obtener id_orden de localStorage
    const id_orden = localStorage.getItem('id_orden');
    
    // Obtener ultima_orden de localStorage y parsear el JSON
    const ultima_orden = JSON.parse(localStorage.getItem('ultima_orden'));
    
    // Validar que los datos necesarios estén presentes
    if (!id_orden || !ultima_orden || !ultima_orden.fecha) {
        alert('Faltan datos necesarios para crear la factura.');
        return;
    }

    // Crear los datos para la factura
    const data = {
        id_orden: id_orden,
        fecha_emision: ultima_orden.fecha
    };

    // Hacer la petición a la API para crear la factura
    fetch('http://localhost/Relojeria/Controller/facturas.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Factura creada con éxito:', data);
        alert('Factura creada con éxito, ahora puede marcar el pago.');
        
        // Guardar el id_factura en localStorage
        localStorage.setItem('id_factura', data);
        

        // Mostrar el botón de "Aceptar Pago"
        document.getElementById('aceptarPagoBtn').style.display = 'inline-block';

        //window.location.href = `form2.php`;
        
    })
    .catch((error) => {
        console.error('Error al crear la factura:', error);
        alert('Hubo un error al crear la factura.');
    });

    window.location.href = `form2.php`;
}

function crearPago() {
    // Obtener id_factura de localStorage
    const id_factura = localStorage.getItem('id_usuario');
    
    // Obtener id_tarjeta de localStorage
    const id_tarjeta = localStorage.getItem('id_tarjeta');
    
    // Obtener ultima_orden de localStorage y parsear el JSON
    const ultima_orden = JSON.parse(localStorage.getItem('ultima_orden'));
    
    // Obtener monto_pagado de localStorage
    const monto_pagado = localStorage.getItem('total');
    
    // Validar que los datos necesarios estén presentes
    if (!id_factura || !id_tarjeta || !ultima_orden || !ultima_orden.fecha || !monto_pagado) {
        alert('Faltan datos necesarios para crear el pago.');
        return;
    }

    // Crear los datos para el pago
    const data = {
        id_factura: id_factura,
        id_tarjeta: id_tarjeta,
        fecha_pago: ultima_orden.fecha,
        monto_pagado: monto_pagado
    };

    // Hacer la petición a la API para crear el pago
    fetch('http://localhost/Relojeria/Controller/pagos.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Pago creado con éxito:', data);
        alert('Pago creado con éxito.');
        window.location.href = `index.php`;
    })
    .catch((error) => {
        console.error('Error al crear el pago:', error);
        alert('Hubo un error al crear el pago.');
        window.location.href = `index.php`;
    });
}

function limpiarLocalStorage() {
    // Limpiar las variables de localStorage usadas
    localStorage.removeItem('id_orden');
    localStorage.removeItem('id_usuario');
    localStorage.removeItem('total');
    localStorage.removeItem('ultima_orden');
    localStorage.removeItem('carrito');
    localStorage.removeItem('id_factura');
}

function aceptarPago() {
    crearPago();
    limpiarLocalStorage();
    window.location.href = `index.php`;
}

document.addEventListener('DOMContentLoaded', function() {
    // Obtener los datos de localStorage
    const idUsuario = localStorage.getItem('id_usuario');
    const numeroTarjeta = localStorage.getItem('numero_tarjeta');
    const total = localStorage.getItem('total');

    // Asignar los valores a los inputs del formulario
    document.getElementById('id_usuario').value = idUsuario;
    document.getElementById('numero_tarjeta').value = numeroTarjeta;
    document.getElementById('total').value = `$${parseFloat(total).toFixed(2)}`;
});
