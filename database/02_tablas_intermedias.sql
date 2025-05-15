-- Tabla de variantes de balones
CREATE TABLE balon_color (
    id INT AUTO_INCREMENT PRIMARY KEY,
    balon_id INT,
    color_id INT,

    sku VARCHAR(50) UNIQUE,
    stock INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,

    UNIQUE (balon_id, color_id),
    FOREIGN KEY (balon_id) REFERENCES balones(id),
    FOREIGN KEY (color_id) REFERENCES colores(id)
);

-- Tabla de variantes de zapatilla
CREATE TABLE zapatilla_talla_color (
    id INT AUTO_INCREMENT PRIMARY KEY,
    zapatilla_id INT,
    talla_id INT,
    color_id INT,

    sku VARCHAR(50) UNIQUE,
    stock INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,

    UNIQUE (zapatilla_id, talla_id, color_id),
    FOREIGN KEY (zapatilla_id) REFERENCES zapatillas(id),
    FOREIGN KEY (talla_id) REFERENCES tallas(id),
    FOREIGN KEY (color_id) REFERENCES colores(id)
);
