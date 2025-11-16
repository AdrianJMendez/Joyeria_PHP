-- Crear la base de datos
CREATE DATABASE joyeria;
USE joyeria;

-- Tablas
CREATE TABLE Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100),
    contraseña VARCHAR(100),
	activo INT(1) DEFAULT 0 NOT NULL,    
    CHECK(activo IN (0,1))
);

CREATE TABLE Rol(
	id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(100) NOT NULL
);

CREATE TABLE Privilegios(
	id_privilegio INT AUTO_INCREMENT PRIMARY KEY,
    nombre_privilegio VARCHAR(80) NOT NULL
);

CREATE TABLE Usuarios_rol(
	id_usuario INT,
    id_rol INT,
    PRIMARY KEY(id_usuario, id_rol),
    FOREIGN KEY(id_usuario) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY(id_rol) REFERENCES Rol(id_rol)
);

CREATE TABLE Privilegios_rol(
	id_rol INT,
    id_privilegio INT,
    PRIMARY KEY(id_rol, id_privilegio),
    FOREIGN KEY(id_rol) REFERENCES Rol(id_rol),
    FOREIGN KEY(id_privilegio) REFERENCES Privilegios(id_privilegio)
);

CREATE TABLE Categoria(
	id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(100)
);

CREATE TABLE Joyas(
    id_joya INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    material VARCHAR(100), 
    id_categoria INT,
    imagen_url VARCHAR(150),
    talla VARCHAR(100),
    precio DECIMAL(10, 2),
    detalle VARCHAR(100),
    
    FOREIGN KEY(id_categoria) REFERENCES Categoria(id_categoria)
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
    id_joya INT,
    cantidad INT,
    FOREIGN KEY (id_orden) REFERENCES Orden_de_Compra(id_orden),
    FOREIGN KEY (id_joya) REFERENCES joyas(id_joya)
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

ALTER TABLE Joyas
ADD COLUMN stock INT DEFAULT 0;

ALTER TABLE Joyas ADD COLUMN agotado_en DATETIME NULL;
