--Tablas

CREATE TABLE Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100),
    contraseña VARCHAR(100),
    tipo VARCHAR(50)
);

CREATE TABLE Relojes (
    id_reloj INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100),
    modelo VARCHAR(100),
    imagen_url VARCHAR(150),
    precio DECIMAL(10, 2)
);

CREATE TABLE Orden_de_Compra (
    id_orden INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    fecha DATE,
    total DECIMAL(10, 2),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE Detalle_de_Orden (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_orden INT,
    id_reloj INT,
    cantidad INT,
    FOREIGN KEY (id_orden) REFERENCES Orden_de_Compra(id_orden),
    FOREIGN KEY (id_reloj) REFERENCES Relojes(id_reloj)
);

CREATE TABLE Factura (
    id_factura INT AUTO_INCREMENT PRIMARY KEY,
    id_orden INT,
    fecha_emision DATE,
    FOREIGN KEY (id_orden) REFERENCES Orden_de_Compra(id_orden)
);

CREATE TABLE Tarjetas_de_Credito (
    id_tarjeta INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    numero_tarjeta VARCHAR(16),
    nombre_titular VARCHAR(100),
    fecha_vencimiento DATE,
    cvv VARCHAR(4),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE Pagos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    id_factura INT,
    id_tarjeta INT,
    fecha_pago DATE,
    monto_pagado DECIMAL(10, 2),
    FOREIGN KEY (id_factura) REFERENCES Factura(id_factura),
    FOREIGN KEY (id_tarjeta) REFERENCES Tarjetas_de_Credito(id_tarjeta)
);



--Registros

-- Insertar registros en la tabla Usuarios
INSERT INTO Usuarios (nombre, email, contraseña, tipo) VALUES
('Adrián Méndez', 'adrian@example.com', 'pass1234', 'cliente'),
('María López', 'maria@example.com', 'maria2024', 'cliente'),
('Carlos Ruiz', 'carlos@example.com', 'carlos5678', 'administrador');

-- Insertar registros en la tabla Relojes
INSERT INTO Relojes (marca, modelo, precio, imagen_url) VALUES
('Rolex', 'Oyster Perpetual', 6500.00, 'https://png.pngtree.com/png-vector/20240528/ourmid/pngtree-rolex-watch-with-two-tone-stainless-steel-and-gold-design-perfect-png-image_12534808.png'),
('Seiko', 'Prospex Diver', 750.00, 'https://www.seikoboutique.co.uk/wp-content/uploads/2022/06/SSK001K1-800x800.png'),
('Casio', 'G-Shock', 120.00, 'https://www.manzanaresjoyero.com/3442-large_default/reloj-casio-g-shock-g-steel-analogico-acero-resina-hombre-gstb100d1aer.jpg'),
('Tag Heuer', 'Carrera', 3500.00, 'https://www.tagheuer.com/on/demandware.static/-/Sites-tagheuer-master/default/dwdebc32ca/TAG_Heuer_Carrera/CBN2A1AA.BA0643/CBN2A1AA.BA0643_1000.png'),
('Omega', 'Seamaster', 4500.00, 'https://content.thewosgroup.com/productimage/17331937/17331937_1.jpg?impolicy=hero&imwidth=700'),
('Breitling', 'Navitimer', 5000.00, 'https://idealjoyeros.com/wp-content/uploads/2_AG126064-5.png');

-- Insertar registros en la tabla Orden_de_Compra
INSERT INTO Orden_de_Compra (id_usuario, fecha, total) VALUES
(1, '2024-09-01', 6500.00),
(2, '2024-09-02', 750.00),
(1, '2024-09-03', 120.00);

-- Insertar registros en la tabla Detalle_de_Orden
INSERT INTO Detalle_de_Orden (id_orden, id_reloj, cantidad) VALUES
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
(1, '4111111111111111', 'Adrián Méndez', '2025-12-31', '123'),
(2, '4222222222222222', 'María López', '2026-08-31', '456'),
(1, '4333333333333333', 'Adrián Méndez', '2024-07-31', '789');

-- Insertar registros en la tabla Pagos
INSERT INTO Pagos (id_factura, id_tarjeta, fecha_pago, monto_pagado) VALUES
(1, 1, '2024-09-01', 6500.00),
(2, 2, '2024-09-02', 750.00),
(3, 3, '2024-09-03', 120.00);
