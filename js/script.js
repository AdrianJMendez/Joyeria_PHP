// Función para obtener todos los relojes
function obtenerTodosLosRelojes() {
    const xhr = new XMLHttpRequest();
    //Esta Url corresponde a un servidor levantado en Wampp
    xhr.open('GET', 'http://localhost/Relojeria/Controller/relojes.php', false); // false para síncrono
    xhr.onload = function() {
        if (xhr.status === 200) {
            const relojes = JSON.parse(xhr.responseText);
            mostrarRelojes(relojes);
        } else {
            console.error('Error al obtener los relojes');
        }
    };
    xhr.onerror = function() {
        console.error('Error de red');
    };
    xhr.send();
}

// Función para mostrar todos los relojes en la galería
function mostrarRelojes(relojes) {
    const contenedor = document.getElementById('relojes_galeria');
    contenedor.innerHTML = ''; // Limpiar el contenedor antes de agregar relojes

    relojes.forEach(reloj => {
        const relojElemento = document.createElement('div');
        relojElemento.classList.add('col-lg-4', 'col-sm-6', 'mb-4');

        relojElemento.innerHTML = `
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal${reloj.id_reloj}">
                    <div class="portfolio-hover">
                    </div>
                    <img class="img-fluid" src="${reloj.imagen_url}" alt="${reloj.marca} ${reloj.modelo}" />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">${reloj.marca}</div>
                    <div class="portfolio-caption-subheading">${reloj.modelo}</div>
                    <div class="portfolio-caption-subheading text-muted">$${parseFloat(reloj.precio).toFixed(2)}</div>
                </div>
                <!-- Botones para aumentar y disminuir cantidad -->
                <div class="input-group mb-3 quantity-selector">
                <button class="btn btn-outline-secondary button-minus" type="button">-</button>
                <input type="text" class="form-control quantity-input" value="1">
                <button class="btn btn-outline-secondary button-plus" type="button">+</button>
                </div>

                <!-- Botón para agregar al carrito -->
                <button class=" btn btn-outline-warning add-to-cart" type="button" data-id="${reloj.id_reloj}" data-marca="${reloj.marca}" data-modelo="${reloj.modelo}" data-precio="${reloj.precio}" data-imagen="${reloj.imagen_url}">
                <i class="bi bi-cart"></i> AGREGAR
                </button>
            </div>
        `;
        contenedor.appendChild(relojElemento);
    });
}

// Llamar a la función para obtener y mostrar los relojes
obtenerTodosLosRelojes();

// Aumentar y disminuir la cantidad
document.querySelectorAll('.button-minus').forEach(button => {
    button.addEventListener('click', function () {
      let quantityInput = this.nextElementSibling;
      let quantity = parseInt(quantityInput.value);
      if (quantity > 1) {
        quantityInput.value = quantity - 1;
      }
    });
  });
  
  document.querySelectorAll('.button-plus').forEach(button => {
    button.addEventListener('click', function () {
      let quantityInput = this.previousElementSibling;
      let quantity = parseInt(quantityInput.value);
      quantityInput.value = quantity + 1;
    });
  });

  // Mostrar modal de guardar y agregar a LocalStorage
  document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const marca = this.getAttribute('data-marca');
        const modelo = this.getAttribute('data-modelo');
        const precio = this.getAttribute('data-precio');
        const imagen = this.getAttribute('data-imagen');
        const cantidad = this.previousElementSibling.querySelector('.quantity-input').value;

        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const producto = { id_reloj: id, marca: marca, modelo: modelo, cantidad: cantidad, precio: precio, imagen_url: imagen };

        carrito.push(producto);
        localStorage.setItem('carrito', JSON.stringify(carrito));

        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    });
});
function cerrarModal() {
    var modalElement = document.getElementById('successModal');
    var modalInstance = bootstrap.Modal.getInstance(modalElement); // Obtiene la instancia del modal
    modalInstance.hide(); // Cierra el modal
}

