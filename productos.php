<?php
// Incluye el archivo de conexión a la base de datos
include 'conexion.php';

// Consulta para obtener todos los productos
$sql = "SELECT * FROM Productos";
$result = $conn->query($sql);

// Verifica si hay productos disponibles
if ($result->num_rows > 0) {
    // Mostrar cada producto
    while ($row = $result->fetch_assoc()) {
        echo "<div class='producto'>";
        echo "<img src='" . $row['imagen_url'] . "' alt='" . $row['nombre'] . "'>";
        echo "<h3>" . $row['nombre'] . "</h3>";
        echo "<p>" . $row['descripcion'] . "</p>";
        echo "<p>Precio: $" . $row['precio'] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}

// Cierra la conexión
$conn->close();
?>
