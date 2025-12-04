<?php

class AuthMiddleware
{
    private $authHelper;
    private $userId;

    public function __construct($authHelper)
    {
        $this->authHelper = $authHelper;
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $this->userId = $_SESSION['usuario_id'] ?? null;
    }

    /**
     * Middleware: Verificar que el usuario esté autenticado
     * @throws Exception Si el usuario no está autenticado
     */
    public function requireLogin()
    {
        if (!$this->userId) {
            http_response_code(401);
            echo json_encode([
                'error' => true,
                'message' => 'Debes iniciar sesión para acceder'
            ]);
            exit;
        }

        return true;
    }

    /**
     * Middleware: Verificar que el usuario tenga un rol específico
     * @param string $rol Nombre del rol requerido
     * @throws Exception Si el usuario no tiene el rol
     */
    public function requireRole($rol)
    {
        $this->requireLogin();

        if (!$this->authHelper->tieneRol($this->userId, $rol)) {
            http_response_code(403);
            echo json_encode([
                'error' => true,
                'message' => "Acceso denegado. Solo usuarios con rol '$rol' pueden acceder."
            ]);
            exit;
        }

        return true;
    }

    /**
     * Middleware: Verificar que el usuario tenga un privilegio específico
     * @param string $privilegio Nombre del privilegio requerido
     * @throws Exception Si el usuario no tiene el privilegio
     */
    public function requirePrivilegio($privilegio)
    {
        $this->requireLogin();

        if (!$this->authHelper->tienePrivilegio($this->userId, $privilegio)) {
            http_response_code(403);
            echo json_encode([
                'error' => true,
                'message' => "Acceso denegado. No tienes el privilegio '$privilegio'."
            ]);
            exit;
        }

        return true;
    }

    /**
     * Middleware: Verificar múltiples roles (el usuario debe tener AL MENOS UNO)
     * @param array $roles Array de nombres de roles
     */
    public function requireAnyRole($roles)
    {
        $this->requireLogin();

        foreach ($roles as $rol) {
            if ($this->authHelper->tieneRol($this->userId, $rol)) {
                return true;
            }
        }

        http_response_code(403);
        echo json_encode([
            'error' => true,
            'message' => "Acceso denegado. Debes tener uno de estos roles: " . implode(', ', $roles)
        ]);
        exit;
    }

    /**
     * Middleware: Verificar múltiples roles (el usuario debe tener TODOS)
     * @param array $roles Array de nombres de roles
     */
    public function requireAllRoles($roles)
    {
        $this->requireLogin();

        foreach ($roles as $rol) {
            if (!$this->authHelper->tieneRol($this->userId, $rol)) {
                http_response_code(403);
                echo json_encode([
                    'error' => true,
                    'message' => "Acceso denegado. Debes tener todos estos roles: " . implode(', ', $roles)
                ]);
                exit;
            }
        }

        return true;
    }


    public function getUserId()
    {
        return $this->userId;
    }


    public function getUserData()
    {
        if (!$this->userId) {
            return null;
        }

        return [
            'id' => $_SESSION['usuario_id'] ?? null,
            'email' => $_SESSION['usuario_email'] ?? null,
            'nombre' => $_SESSION['usuario_nombre'] ?? null,
            'rol' => $_SESSION['usuario_rol'] ?? null,
            'id_rol' => $_SESSION['usuario_id_rol'] ?? null,
            'privilegios' => $_SESSION['usuario_privilegios'] ?? []
        ];
    }
}
?>
