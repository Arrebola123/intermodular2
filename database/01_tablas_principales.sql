-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla principal de artículos
CREATE TABLE articulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('zapatilla', 'balon', 'generico') NOT NULL
);

-- Tabla de zapatillas (hereda id de articulos)
CREATE TABLE zapatillas (
    id INT PRIMARY KEY,
    cierre VARCHAR(50) NOT NULL,
    FOREIGN KEY (id) REFERENCES articulos(id)
);

-- Tabla de balones (hereda id de articulos)
CREATE TABLE balones (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES articulos(id)
);

-- Tabla de artículos genéricos (sin variantes)
CREATE TABLE genericos (
    id INT PRIMARY KEY,
    sku VARCHAR(50) UNIQUE,
    stock INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    
    FOREIGN KEY (id) REFERENCES articulos(id)
);

-- Tabla de tallas
CREATE TABLE tallas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL
);

-- Tabla de colores
CREATE TABLE colores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL
);
