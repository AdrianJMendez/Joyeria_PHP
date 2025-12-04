-- Archivo: 001_actualizacion_roles_usuarios.sql
-- Este archivo actualiza roles, usuarios y asignaciones sin borrar la base existente

-- ------------------------
-- Actualizar nombres y correos de usuarios existentes
-- ------------------------
UPDATE Usuarios
SET nombre = 'Jonathan Aguilar', email = 'john.aguilar@email.com'
WHERE id_usuario = 4;

-- ------------------------
-- Insertar nuevos usuarios
-- ------------------------
INSERT INTO Usuarios (id_usuario, nombre, email, contraseña, activo)
VALUES 
(5, 'Nissi Aguilar', 'nissi.aguilar@email.com', 'nissi123', 1),
(6, 'Jack Burton', 'jack.burton@email.com', 'jack123', 1);

-- ------------------------
-- Actualizar nombre de rol existente (id_rol = 5)
-- ------------------------
UPDATE Rol
SET nombre_rol = 'Diseñadora Principal'
WHERE id_rol = 5;

-- ------------------------
-- Actualizar roles de usuarios existentes
-- ------------------------
DELETE FROM Usuarios_rol WHERE id_usuario = 1; -- Cesar Cruz
INSERT INTO Usuarios_rol (id_usuario, id_rol) VALUES (1, 4); -- Gerente

DELETE FROM Usuarios_rol WHERE id_usuario = 3; -- Sofia Urrutia
INSERT INTO Usuarios_rol (id_usuario, id_rol) VALUES (3, 5); -- Diseñadora Principal

DELETE FROM Usuarios_rol WHERE id_usuario = 4; -- Jonathan Aguilar
INSERT INTO Usuarios_rol (id_usuario, id_rol) VALUES (4, 1); -- Administrador

-- ------------------------
-- Asignar roles a nuevos usuarios
-- ------------------------
INSERT INTO Usuarios_rol (id_usuario, id_rol) VALUES (5, 2); -- Nissi Aguilar → Cliente
INSERT INTO Usuarios_rol (id_usuario, id_rol) VALUES (6, 2); -- Jack Burton → Cliente
