// Función para obtener todas las joyas
function obtenerTodasLasJoyas() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/Joyeria/Controller/joyas.php', false); // Cambia la ruta según tu estructura
    xhr.onload = function() {
        if (xhr.status === 200) {
            const joyas = JSON.parse(xhr.responseText);
            mostrarJoyas(joyas);
        } else {
            console.error('Error al obtener las joyas');
        }
    };
    xhr.onerror = function() {
        console.error('Error de red');
    };
    xhr.send();
}

// Función para mostrar las joyas en la galería
function mostrarJoyas(joyas) {
    const contenedor = document.getElementById('joyas_galeria');
    contenedor.innerHTML = '';

    joyas.forEach(joya => {
        const joyaElemento = document.createElement('div');
        joyaElemento.classList.add('col-lg-4', 'col-sm-6', 'mb-4');

        joyaElemento.innerHTML = `
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#joyaModal${joya.id_joya}">
                    <div class="portfolio-hover"></div>
                    <img class="img-fluid" src="${joya.imagen_url}" alt="${joya.nombre}" />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">${joya.nombre}</div>
                    <div class="portfolio-caption-subheading">${joya.material || ''}</div>
                    <div class="portfolio-caption-subheading text-muted">$${parseFloat(joya.precio).toFixed(2)}</div>
                </div>

                <div class="input-group mb-3 quantity-selector">
                    <button class="btn btn-outline-secondary button-minus" type="button">-</button>
                    <input type="text" class="form-control quantity-input" value="1">
                    <button class="btn btn-outline-secondary button-plus" type="button">+</button>
                </div>

                <button 
                    class="btn btn-outline-warning add-to-cart" 
                    type="button"
                    data-id="${joya.id_joya}"
                    data-nombre="${joya.nombre}"
                    data-material="${joya.material}"
                    data-precio="${joya.precio}"
                    data-imagen="${joya.imagen_url}">
                    <i class="bi bi-cart"></i> AGREGAR
                </button>

            </div>
        `;
        contenedor.appendChild(joyaElemento);
    });
}

// Cargar las joyas al inicio
obtenerTodasLasJoyas();

// Botones + y -
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('button-minus')) {
        const input = e.target.nextElementSibling;
        if (parseInt(input.value) > 1) input.value--;
    }
    if (e.target.classList.contains('button-plus')) {
        const input = e.target.previousElementSibling;
        input.value++;
    }
});

document.addEventListener('click', function (e) {
    const button = e.target.closest('.add-to-cart');
    if (button) {
        const producto = {
            id_joya: button.getAttribute('data-id'),
            nombre: button.getAttribute('data-nombre'),
            material: button.getAttribute('data-material'),
            precio: parseFloat(button.getAttribute('data-precio')),
            imagen_url: button.getAttribute('data-imagen'),
            cantidad: parseInt(button.parentElement.querySelector('.quantity-input').value)
        };

        // Enviar datos al PHP para verificar el stock
        fetch('verificar_stock.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                id_joya: producto.id_joya,
                cantidad: producto.cantidad
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Agregar al carrito en localStorage
                let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
                carrito.push(producto);
                localStorage.setItem('carrito', JSON.stringify(carrito));

                // Mostrar modal de éxito
                mostrarModal('Éxito', data.message);
            } else {
                // Mostrar modal de error con stock actual
                mostrarModal('Sin stock suficiente', data.message);
            }
        })
        .catch(error => {
            mostrarModal('Error', 'Hubo un problema al procesar tu solicitud.');
            console.error('Error:', error);
        });
    }
});
mostrarModal('Éxito', 'Su compra ha sido agregada al carrito con éxito');



function cerrarModal() {
    const modalElement = document.getElementById('successModal');
    const modalInstance = bootstrap.Modal.getInstance(modalElement);
    modalInstance.hide();
}
