-- Insertar Usuarios
INSERT INTO Usuarios (nombre, email, contraseña, activo) VALUES 
('Cesar Cruz', 'cesar.cruz@email.com', 'hashed_password_cesar', 1),
('Adrian Mendez', 'adrian.mendez@email.com', 'hashed_password_adrian', 1),
('Sofia Urrutia', 'sofia.urrutia@email.com', 'hashed_password_sofia', 1),
('John Fiallos', 'john.fiallos@email.com', 'hashed_password_john', 1);

-- Insertar Roles
INSERT INTO Rol(nombre_rol) VALUES 
('Administrador'),
('Cliente'),
('Vendedor'),
('Gerente'),
('Soporte_Tecnico');

-- Insertar Privilegios
INSERT INTO Privilegios(nombre_privilegio) VALUES 
('gestionar_usuarios'),
('gestionar_productos'),
('gestionar_pedidos'),
('gestionar_inventario'),
('ver_reportes'),
('gestionar_promociones'),
('realizar_compras'),
('gestionar_contabilidad'),
('soporte_cliente'),
('configurar_sistema');

-- Asignar Roles a Usuarios
INSERT INTO Usuarios_rol(id_usuario, id_rol) VALUES 
(1, 1),  -- Cesar Cruz como Administrador
(2, 3),  -- Adrian Mendez como Vendedor
(3, 2),  -- Sofia Urrutia como Cliente
(4, 4);  -- John Fiallos como Gerente

-- Asignar Privilegios a Roles
INSERT INTO Privilegios_rol(id_rol, id_privilegio) VALUES 
-- Administrador (todos los privilegios)
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6), (1, 7), (1, 8), (1, 9), (1, 10),

-- Cliente (solo compras)
(2, 7),

-- Vendedor (gestión productos, pedidos, inventario, compras)
(3, 2), (3, 3), (3, 4), (3, 7),

-- Gerente (gestión + reportes + promociones + contabilidad)
(4, 2), (4, 3), (4, 4), (4, 5), (4, 6), (4, 7), (4, 8),

-- Soporte Técnico (soporte cliente y ver pedidos)
(5, 9), (5, 3);

-- tablas categorias y productos
INSERT INTO Categoria(nombre_categoria) VALUES ('Anillos'),
											   ('Aretes'),
                                               ('Brazaletes'),
                                               ('Collares');

-- ARETES 
INSERT INTO Joyas (nombre, material, id_categoria, imagen_url, talla, precio, detalle)
VALUES 
('Aretes Esmeralda', 'Oro 14K', 2, NULL, NULL, 737.00, 'Esmeralda forma de pera y diamantes 14 quilates'),
('Aretes Perla', 'Oro 14K', 2, NULL, NULL, 601.00, 'Perla clasica y diamantes 14 quilates'),
('Aretes Oro Blanco', 'Oro blanco 14K', 2, NULL, NULL, 369.00, 'Mini aros con diamantes 14 quilates');

-- BRAZALETES 
INSERT INTO Joyas (nombre, material, id_categoria, imagen_url, talla, precio, detalle)
VALUES
('Oval Snake Chain with Lobster Lock', 'Oro 14K', 3, NULL, 'M', 1485.00, 'Cadena tipo snake con cierre de langosta'),
('Diamond Circle on Curb Chain Bracelet', 'Oro 14K', 3, NULL, 'L', 1473.00, 'Diamantes 0.17 quilates'),
('Skema Borsari Gioielli', 'Acero + Oro rosa 18K', 3, NULL, 'XL', 217.00, 'Clavos de oro rosa incrustados');

-- COLLARES 
INSERT INTO Joyas (nombre, material, id_categoria, imagen_url, talla, precio, detalle)
VALUES
('Rose Station Necklace', 'Oro 14K', 4, NULL, 'Ajustable 5cm', 1645.00, 'Diamante de 3 puntos'),
('Mini Open Marquise Adjustable Necklace', 'Oro 14K', 4, NULL, 'Ajustable 45cm', 197.00, 'Corte marquesa'),
('Tilted Butterfly Necklace', 'Oro 14K', 4, NULL, 'Ajustable 45cm', 663.00, 'Diseño mariposa');

-- ANILLOS 
INSERT INTO Joyas (nombre, material, id_categoria, imagen_url, talla, precio, detalle)
VALUES
('Anillo de compromiso', 'Oro', 1, NULL, '4', 2700.00, 'Diamante de 1 quilate'),
('Anillo Oro Blanco', 'Oro blanco 18K', 1, NULL, '16', 800.00, 'Diamante 0.23 quilates'),
('Anillo Oro 14K', 'Oro 14K', 1, NULL, '6', 1039.00, NULL);


-- Insertar registros en la tabla Orden_de_Compra
INSERT INTO Orden_de_Compra (id_usuario, fecha, total) VALUES
(1, '2024-09-01', 6500.00),
(2, '2024-09-02', 750.00),
(1, '2024-09-03', 120.00);

-- Insertar registros en la tabla Detalle_de_Orden
INSERT INTO Detalle_de_Orden (id_orden, id_joya, cantidad) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- Insertar registros en la tabla Factura
INSERT INTO Factura (id_orden, fecha_emision) VALUES
(1, '2024-09-01'),
(2, '2024-09-02'),
(3, '2024-09-03');

-- Insertar registros en la tabla Tarjetas_de_Credito
INSERT INTO Tarjetas_de_Credito (id_usuario, numero_tarjeta, nombre_titular, fecha_vencimiento, cvv) VALUES
(1, '4111111111111111', 'Cesar Cruz', '2025-12-31', '123'),
(2, '4222222222222222', 'Adrián Méndez', '2026-08-31', '456'),
(3, '4333333333333333', 'Sofia Urrutia', '2024-07-31', '789');

-- Insertar registros en la tabla Pagos
INSERT INTO Pagos (id_factura, id_tarjeta, fecha_pago, monto_pagado) VALUES
(1, 1, '2024-09-01', 6500.00),
(2, 2, '2024-09-02', 750.00),
(3, 3, '2024-09-03', 120.00);

-- ANILLOS
UPDATE Joyas SET imagen_url = 'img/products/anillos/Anillo de compromiso img1.png' WHERE nombre = 'Anillo de compromiso';
UPDATE Joyas SET imagen_url = 'img/products/anillos/Anillo oro blanco.png' WHERE nombre = 'Anillo Oro Blanco';
UPDATE Joyas SET imagen_url = 'img/products/anillos/Anillo oro 14k img 1.png' WHERE nombre = 'Anillo Oro 14K';

-- ARETES
UPDATE Joyas SET imagen_url = 'img/products/Aretes/Aretes Esmeralda.png' WHERE nombre = 'Aretes Esmeralda';
UPDATE Joyas SET imagen_url = 'img/products/Aretes/Aretes oro blanco.png' WHERE nombre = 'Aretes Oro Blanco';
UPDATE Joyas SET imagen_url = 'img/products/Aretes/Aretes Perla.png' WHERE nombre = 'Aretes Perla';

-- BRAZALETES
UPDATE Joyas SET imagen_url = 'img/products/brazaletes/Diamond Circle on Curb Chain Bracelet img 2.png' WHERE nombre = 'Diamond Circle on Curb Chain Bracelet';
UPDATE Joyas SET imagen_url = 'img/products/brazaletes/Oval Snake Chain with Lobster Lock img 1.png' WHERE nombre = 'Oval Snake Chain with Lobster Lock';
UPDATE Joyas SET imagen_url = 'img/products/brazaletes/Skema Borsari Gioielli img 2.png' WHERE nombre = 'Skema Borsari Gioielli';

-- COLLARES
UPDATE Joyas SET imagen_url = 'img/products/collares/Mini Open Marquise Adjustable Necklace img 2.png' WHERE nombre = 'Mini Open Marquise Adjustable Necklace';
UPDATE Joyas SET imagen_url = 'img/products/collares/Rose Station Necklace img 1.png' WHERE nombre = 'Rose Station Necklace';
UPDATE Joyas SET imagen_url = 'img/products/collares/Tilted Butterfly Necklace img 1.png' WHERE nombre = 'Tilted Butterfly Necklace';

UPDATE Joyas
SET stock = FLOOR(1 + (RAND() * 10));
