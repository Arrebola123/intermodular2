<?php
require_once __DIR__ . '/../config/db.php'; // Ajustá la ruta si es necesario

$termino = trim($_GET['q'] ?? '');

if (!$termino) {
    echo "<p>No se ingresó ningún término de búsqueda.</p>";
    exit;
}

$termino = $conexion->real_escape_string($termino);

// Agregar el asterisco para búsqueda por prefijo
$termino_busqueda = $termino . '*';

$consulta = "
    SELECT p.id, p.nombre, p.precio, p.imagen1, m.nombre AS marca,
           MATCH(p.nombre) AGAINST('$termino_busqueda' IN BOOLEAN MODE) AS relevancia_prod,
           MATCH(m.nombre) AGAINST('$termino_busqueda' IN BOOLEAN MODE) AS relevancia_marca
    FROM productos p
    INNER JOIN marca m ON p.id_marca = m.id
    WHERE MATCH(p.nombre) AGAINST('$termino_busqueda' IN BOOLEAN MODE)
       OR MATCH(m.nombre) AGAINST('$termino_busqueda' IN BOOLEAN MODE)
    ORDER BY (relevancia_prod + relevancia_marca) DESC
    LIMIT 5
";

$resultado = $conexion->query($consulta);

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div class='search-item' onclick=\"window.location.href='productos/show.php?id=" . $fila['id'] . "'\">";
        echo "<img src='" . htmlspecialchars($fila['imagen1']) . "' width='50' height='50'>";
        echo "<span>" . htmlspecialchars($fila["marca"]) . " - " . htmlspecialchars($fila["nombre"]) . "</span>";
        echo "</div>";
    }
} else {
    echo "<p>No se encontraron resultados.</p>";
}

$conexion->close();
?>
