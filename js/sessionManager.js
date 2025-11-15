class SessionManager {
    static verificarSesion() {
        const usuario = localStorage.getItem('usuario');
        const token = localStorage.getItem('token');
        return !!(usuario && token);
    }

    static obtenerUsuario() {
        const usuario = localStorage.getItem('usuario');
        return usuario ? JSON.parse(usuario) : null;
    }

    static guardarSesion(datosUsuario) {
        const datosSeguros = {
            id: datosUsuario.id,
            name: datosUsuario.name, 
            email: datosUsuario.email,
            rol: datosUsuario.rol,
            privilegios: datosUsuario.privilegios,
            fechaLogin: new Date().toISOString()
        };
        
        localStorage.setItem('usuario', JSON.stringify(datosSeguros));
        localStorage.setItem('token', datosUsuario.token);
    }

    static cerrarSesion() {
        if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
            localStorage.removeItem('usuario');
            localStorage.removeItem('token');
            
            window.location.href = 'login.php';
        }
    }

    static actualizarNavbar() {
        const authNavItem = document.getElementById('auth-nav-item');
        if (!authNavItem) return;

        if (this.verificarSesion()) {
            const usuario = this.obtenerUsuario();
            authNavItem.innerHTML = `
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" 
                       href="javascript:void(0)" role="button" data-bs-toggle="dropdown" 
                       aria-expanded="false" style="cursor: pointer;">
                        <i class="fas fa-user me-2"></i>
                        <span>${usuario.name.split(' ')[0]}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="perfil.php">
                            <i class="fas fa-user me-2"></i>Mi Perfil
                        </a>
                        <a class="dropdown-item" href="pedidos.php">
                            <i class="fas fa-shopping-bag me-2"></i>Mis Pedidos
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="javascript:void(0)" 
                           onclick="SessionManager.cerrarSesion()">
                            <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                        </a>
                    </div>
                </div>
            `;
            
            // Inicializar el dropdown si es necesario
            this.inicializarDropdown();
        } else {
            authNavItem.innerHTML = `
                <a class="nav-link" href="login.php">
                    <i class="fas fa-sign-in-alt me-2"></i>Iniciar sesión
                </a>
            `;
        }
    }

        static inicializarDropdown() {
        // Inicializar dropdowns de Bootstrap 5
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
    }
}

// Inicializar en todas las páginas
document.addEventListener('DOMContentLoaded', function() {
    SessionManager.actualizarNavbar();
});