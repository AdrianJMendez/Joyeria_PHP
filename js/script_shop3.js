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
