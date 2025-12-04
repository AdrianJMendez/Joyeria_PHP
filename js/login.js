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
        // Verificar si hay sesión activa - REDIRIGIR A PERFIL en lugar de mostrar mensaje
        if (SessionManager.verificarSesion()) {
            window.location.href = 'perfil.php';
        }
    }

    static processResponce(modalError) {
        let toast = new ErrorToast(modalError);
        let xhr = this;
        
        if (xhr.readyState == XMLHttpRequest.DONE && (xhr.status >= 200 && xhr.status < 402)) {	
            let JsonResponse = JSON.parse(xhr.responseText);
            if (JsonResponse.status) {
                // Guardar sesión con los datos correctos del servidor
                SessionManager.guardarSesion({
                    id: JsonResponse.data.id,
                    name: JsonResponse.data.nombre,  // API devuelve 'nombre', normalizamos a 'name'
                    email: JsonResponse.data.email,
                    rol: JsonResponse.data.rol,
                    privilegios: JsonResponse.data.privilegios,
                    token: JsonResponse.data.token
                });
                
                // REDIRIGIR A PERFIL en lugar de mostrar sesión activa
                window.location.href = 'perfil.php';
            } else {
                toast.show(JsonResponse.message);
            }
        }
    }

    static send(data, modalError) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", CONFIG.USUARIOS.LOGIN, true);
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