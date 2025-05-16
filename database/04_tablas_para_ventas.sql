CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    usuario_id INT,
    cantidad_total INT NOT NULL,
    importe_total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE venta_articulo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venta_id INT NOT NULL,
    articulo_id INT NOT NULL,
    articulo_tipo ENUM('zapatilla', 'balon', 'generico') DEFAULT 'generico',
    variante_id INT,
    variante_sku VARCHAR(50),
    cantidad INT NOT NULL,
    precio_ud DECIMAL(10,2) NOT NULL,
    
    FOREIGN KEY (venta_id) REFERENCES ventas(id),
    FOREIGN KEY (articulo_id) REFERENCES articulos(id)
    -- NOTA: no ponemos FK a variante_id porque depende de tipo_variante
);
