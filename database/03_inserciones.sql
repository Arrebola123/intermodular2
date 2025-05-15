-- Insertamos colores
INSERT INTO colores (nombre) VALUES 
('Rojo'), 
('Azul'), 
('Negro');

-- Insertamos tallas
INSERT INTO tallas (nombre) VALUES 
('38'), 
('39'), 
('40');

-- Insertamos artículos
INSERT INTO articulos (nombre, tipo) VALUES
('Zapatilla Runner Pro', 'zapatilla'),   -- id = 1
('Balón FIFA Quality', 'balon'),         -- id = 2
('Botella aluminio 750ml', 'generico');  -- id = 3

-- Insertamos datos específicos de zapatilla (id = 1)
INSERT INTO zapatillas (id, cierre) VALUES
(1, 'cordones');

-- Insertamos datos específicos de balón (id = 2)
INSERT INTO balones (id) VALUES
(2);

-- Insertamos datos de artículo genérico (id = 3)
INSERT INTO genericos (id, sku, stock, precio) VALUES
(3, 'BOTELLA-750-ALU', 9, 9.99);

-- Insertamos variantes de zapatilla con talla y color
INSERT INTO zapatilla_talla_color (zapatilla_id, talla_id, color_id, sku, stock, precio) VALUES
(1, 1, 1, 'ZAPATILLA-RUN-38-ROJ', 1, 54.99),  -- 38, rojo
(1, 2, 1, 'ZAPATILLA-RUN-39-ROJ', 9, 59.99),  -- 39, rojo
(1, 2, 2, 'ZAPATILLA-RUN-39-AZU', 9, 59.99);  -- 39, azul

-- Insertamos variantes de balón con color
INSERT INTO balon_color (balon_id, color_id, sku, stock, precio) VALUES
(2, 1, 'BALON-FIFA-ROJ', 1, 22.99),
(2, 3, 'BALON-FIFA-NEG', 9, 24.99);


