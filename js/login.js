class ErrorToast {
    constructor(modalToast) {
        this.modalToast = modalToast;
    }

    show(message) {
        const text = this.modalToast.querySelector("#textError");
        text.textContent = message;
        const toast = new bootstrap.Toast(this.modalToast);
        toast.show();
    }
}

class ActionLogin {
    static alertLogin(inputEmail, inputPassword, modalError) {
        let modalE = new ErrorToast(modalError);
        
        if (!Validator.isNull(inputEmail.value) && !Validator.isNull(inputPassword.value)) {
            if (Validator.isEmail(inputEmail.value)) {
                let data = `email=${inputEmail.value}&password=${inputPassword.value}`.trim();
                ActionLogin.send(data, modalError);			
            } else {
                modalE.show("Correo electrónico no válido");
            }	
        } else {
            modalE.show("Llene todos los campos");
        }
    }

    iniciarSesion(email, pass, modalError) {
        ActionLogin.alertLogin(email, pass, modalError);
    }
    static init() {
        // Verificar si hay sesión activa
        if (SessionManager.verificarSesion()) {
            const usuario = SessionManager.obtenerUsuario();
            this.mostrarSesionActiva(usuario.name);
        }
    }
    static processResponce(modalError) {
        let toast = new ErrorToast(modalError);
        let xhr = this;
        
        if (xhr.readyState == XMLHttpRequest.DONE && (xhr.status >= 200 && xhr.status < 402)) {	
            let JsonResponse = JSON.parse(xhr.responseText);
            if (JsonResponse.status) {
                SessionManager.guardarSesion({
                    id: JsonResponse.id,
                    name: JsonResponse.name, 
                    email: JsonResponse.user,
                    rol: JsonResponse.rol,
                    privilegios: JsonResponse.privilegios,
                    token: JsonResponse.token
                });
                
               ActionLogin.mostrarSesionActiva(JsonResponse.name);
            } else {
                toast.show(JsonResponse.message);
            }
        }
    }

    // Función específica para mostrar sesión activa en login
   static mostrarSesionActiva(nombreUsuario) {
        const loginContent = document.querySelector('.card-body');
        
        if (loginContent) {
            loginContent.innerHTML = `
                <div class="text-center">
                    <div class="d-flex align-items-center mb-3 pb-1 justify-content-center">
                        <i class="fas fa-gem fa-2x me-3" style="color: #8B4513;"></i>
                        <span class="h1 fw-bold mb-0" style="color: #8B4513;">Joyas Charly's</span>
                    </div>

                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
                        <h3 style="color: #8B4513;">¡Sesión Iniciada!</h3>
                        <p class="text-muted">Hola <strong>${nombreUsuario}</strong>, tu sesión está activa.</p>
                    </div>

                    <div class="user-actions mb-4">
                        <a href="index.php" class="btn btn-continue me-3">
                            <i class="fas fa-home me-2"></i>Ir al Inicio
                        </a>
                        <button onclick="SessionManager.cerrarSesion()" class="btn btn-logout">
                            <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                        </button>
                    </div>

                    <div class="login-links">
                        <p class="small text-muted">¿No eres ${nombreUsuario}? <a href="#" onclick="SessionManager.cerrarSesion()" style="color: #8B4513;">Cerrar sesión</a></p>
                    </div>
                </div>
            `;
        }
        
        // Actualizar navbar usando SessionManager
        SessionManager.actualizarNavbar();
    }

    static send(data, modalError) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/Joyeria_PHP/Controller/loginController.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.addEventListener("readystatechange", ActionLogin.processResponce.bind(xhr, modalError));
        xhr.send(data);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    ActionLogin.init();
});

// Inicialización
let btnIniciarSesion = document.querySelector('#btnSesion');
let email = document.querySelector('#emailSesion');
let pass = document.querySelector('#pasSesion');
let modalError = document.querySelector("#modalError");

if (btnIniciarSesion) {
    let action = new ActionLogin();
    btnIniciarSesion.addEventListener("click", action.iniciarSesion.bind(action, email, pass, modalError));
}