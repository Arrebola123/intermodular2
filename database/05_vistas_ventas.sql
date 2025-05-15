CREATE VIEW vista_articulos_vendidos AS
SELECT
    av.id AS articulo_venta_id,
    av.venta_id,
    a.nombre AS nombre_articulo,
    a.tipo,
    av.cantidad,
    av.precio_unitario,
    av.tipo_variante,
    
    -- Datos comunes
    av.articulo_id,
    av.variante_id,

    -- Datos de zapatilla_talla_color
    /*
    ztc.talla_id,
    t.nombre AS talla,
    ztc.color_id AS color_zapatilla_id,
    c1.nombre AS color_zapatilla,
    */
    ztc.referencia AS referencia_zapatilla,

    -- Datos de balon_color
    /*
    bc.color_id AS color_balon_id,
    c2.nombre AS color_balon,
    */
    bc.referencia AS referencia_balon,

    -- Datos de generico
    g.referencia AS referencia_generico

FROM articulo_venta av
JOIN articulos a ON a.id = av.articulo_id

-- LEFT JOIN para zapatilla_talla_color
LEFT JOIN zapatilla_talla_color ztc ON av.tipo_variante = 'zapatilla_talla_color' AND ztc.id = av.variante_id
LEFT JOIN tallas t ON ztc.talla_id = t.id
LEFT JOIN colores c1 ON ztc.color_id = c1.id

-- LEFT JOIN para balon_color
LEFT JOIN balon_color bc ON av.tipo_variante = 'balon_color' AND bc.id = av.variante_id
LEFT JOIN colores c2 ON bc.color_id = c2.id

-- LEFT JOIN para generico
LEFT JOIN genericos g ON av.tipo_variante = 'generico' AND g.id = av.articulo_id;

----------------------------------------------------------

CREATE VIEW resumen_ventas AS
SELECT
    v.id AS venta_id,
    v.fecha,
    v.unidades AS unidades_guardado,
    v.importe AS importe_guardado,
    
    COUNT(av.id) AS total_articulos,
    SUM(av.cantidad) AS unidades_calculado,
    SUM(av.precio_unitario * av.cantidad) AS importe_calculado

FROM ventas v
LEFT JOIN articulo_venta av ON v.id = av.venta_id
GROUP BY v.id;


