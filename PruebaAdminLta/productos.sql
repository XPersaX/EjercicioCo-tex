CREATE DATABASE productos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE productos;

CREATE TABLE productos(
    id_producto INT(10) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    cantidad INT(10),
    fecha_registro DATE,
    estado ENUM('DISPONIBLE','AGOTADO')
);