DELIMITER //
CREATE PROCEDURE sp_verificar_usuario_privilegios(
    IN p_email VARCHAR(255),
    IN p_contrasenia VARCHAR(255)
)
BEGIN
    SELECT 
        GROUP_CONCAT(privilegios.nombre_privilegio SEPARATOR ',') AS privilegios,
        rol.nombre_rol, 
        usuarios.nombre, 
        usuarios.email, 
        usuarios.activo
    FROM privilegios
    INNER JOIN privilegios_rol ON privilegios.id_privilegio = privilegios_rol.id_privilegio
    INNER JOIN rol ON privilegios_rol.id_rol = rol.id_rol
    INNER JOIN usuarios_rol ON rol.id_rol = usuarios_rol.id_rol
    INNER JOIN usuarios ON usuarios.id_usuario = usuarios_rol.id_usuario
    WHERE usuarios.email = p_email 
    AND usuarios.contraseña = p_contrasenia
    GROUP BY rol.nombre_rol, usuarios.nombre, usuarios.email, usuarios.activo;
END //
DELIMITER ;

-- Llamar el procedimiento
CALL sp_verificar_usuario_privilegios('cesar.cruz@email.com', 'hashed_password_cesar');

-- eliminar el procedure
DROP PROCEDURE IF EXISTS sp_verificar_usuario_privilegios;