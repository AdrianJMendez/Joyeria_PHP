<?php

class AuthHelper
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * Valida las credenciales del usuario
     * @param string $email
     * @param string $password
     * @return array|false Retorna datos del usuario autenticado o false
     */
    public function autenticar($email, $password)
    {
       
        $query = $this->conexion->prepare("SELECT id_usuario, nombre, contraseña, activo FROM usuarios WHERE email = ?");
        $query->execute([$email]);
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

        
        if (!$usuario) {
            return false;
        }

        
        if ($usuario['contraseña'] !== $password) {
            return false;
        }

        // Verificar si el usuario está activo
        if (!$usuario['activo']) {
            return [
                'error' => true,
                'codigo' => 'usuario_inactivo',
                'message' => 'Usuario inactivo'
            ];
        }

        return $usuario;
    }

    /**
     * Obtiene el rol del usuario
     * @param int $id_usuario
     * @return array|false Retorna información del rol
     */
    public function obtenerRol($id_usuario)
    {
        $query = $this->conexion->prepare(
            "SELECT rol.id_rol, rol.nombre_rol 
             FROM rol 
             INNER JOIN usuarios_rol ON rol.id_rol = usuarios_rol.id_rol 
             WHERE usuarios_rol.id_usuario = ? 
             LIMIT 1"
        );
        $query->execute([$id_usuario]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene los privilegios del usuario según su rol
     * @param int $id_usuario
     * @return array Arreglo con los privilegios del usuario
     */
    public function obtenerPrivilegios($id_usuario)
    {
        $rol = $this->obtenerRol($id_usuario);

        if (!$rol) {
            return [];
        }

        $query = $this->conexion->prepare(
            "SELECT privilegios.id_privilegio, privilegios.nombre_privilegio 
             FROM privilegios 
             INNER JOIN privilegios_rol ON privilegios.id_privilegio = privilegios_rol.id_privilegio 
             WHERE privilegios_rol.id_rol = ?"
        );
        $query->execute([$rol['id_rol']]);
        
        $privilegios = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $privilegios ? $privilegios : [];
    }

    /**
     * Valida completamente a un usuario y obtiene todos sus datos
     * @param string $email
     * @param string $password
     * @return array Retorna información completa del usuario (id, nombre, email, rol, privilegios)
     * @throws Exception Si hay error en la validación
     */
    public function validarUsuarioCompleto($email, $password)
    {
        $usuario = $this->autenticar($email, $password);

        if ($usuario === false) {
            throw new Exception("Credenciales incorrectas");
        }

        if (isset($usuario['error']) && $usuario['error']) {
            throw new Exception($usuario['message']);
        }

        $rol = $this->obtenerRol($usuario['id_usuario']);

        if (!$rol) {
            throw new Exception("No se encontró rol para el usuario");
        }

        $privilegios = $this->obtenerPrivilegios($usuario['id_usuario']);

        return [
            'id_usuario' => $usuario['id_usuario'],
            'nombre' => $usuario['nombre'],
            'email' => $email,
            'rol' => $rol['nombre_rol'],
            'id_rol' => $rol['id_rol'],
            'privilegios' => array_map(function($p) {
                return $p['nombre_privilegio'];
            }, $privilegios),
            'activo' => $usuario['activo']
        ];
    }

    /**
     * Verifica si un usuario tiene un privilegio específico
     * @param int $id_usuario
     * @param string $nombre_privilegio
     * @return bool
     */
    public function tienePrivilegio($id_usuario, $nombre_privilegio)
    {
        $query = $this->conexion->prepare(
            "SELECT COUNT(*) as total 
             FROM privilegios 
             INNER JOIN privilegios_rol ON privilegios.id_privilegio = privilegios_rol.id_privilegio 
             INNER JOIN rol ON privilegios_rol.id_rol = rol.id_rol 
             INNER JOIN usuarios_rol ON rol.id_rol = usuarios_rol.id_rol 
             WHERE usuarios_rol.id_usuario = ? 
             AND privilegios.nombre_privilegio = ?"
        );
        $query->execute([$id_usuario, $nombre_privilegio]);
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        
        return $resultado['total'] > 0;
    }

    /**
     * Verifica si un usuario tiene un rol específico
     * @param int $id_usuario
     * @param string $nombre_rol
     * @return bool
     */
    public function tieneRol($id_usuario, $nombre_rol)
    {
        $query = $this->conexion->prepare(
            "SELECT COUNT(*) as total 
             FROM rol 
             INNER JOIN usuarios_rol ON rol.id_rol = usuarios_rol.id_rol 
             WHERE usuarios_rol.id_usuario = ? 
             AND rol.nombre_rol = ?"
        );
        $query->execute([$id_usuario, $nombre_rol]);
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        
        return $resultado['total'] > 0;
    }
}
?>
