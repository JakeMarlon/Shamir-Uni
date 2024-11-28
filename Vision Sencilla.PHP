<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Realizar una consulta a la base de datos para obtener productos de la categoría "Visión Sencilla"
$sql = "SELECT nombre, descripcion, precio, stock, categoria, imagen_url FROM Productos WHERE categoria = 'Visión Sencilla'";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visión Sencilla - Shamir México</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php#acerca">Acerca de Nosotros</a></li>
                <li><a href="progresivos.php" class="active">Progresivos</a></li>
                <li><a href="bifocales.php">Bifocales</a></li>
                <li><a href="Vision Sencilla.php">Visión Sencilla</a></li>
                <li><a href="Materiales y Tratamientos.php">Materiales y Tratamientos</a></li>
                <li><a href="index.php#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1>Visión Sencilla</h1>

            <?php
            // Verifica si hay productos en la categoría "Visión Sencilla"
            if ($result->num_rows > 0) {
                // Mostrar cada producto
                while ($row = $result->fetch_assoc()) {
                    echo '<article>';
                    echo '<h2>' . $row['nombre'] . '</h2>';
                    echo '<img src="' . $row['imagen_url'] . '" alt="' . $row['nombre'] . '" style="max-width: 35%; height: auto;">';
                    echo '<p>' . $row['descripcion'] . '</p>';
                    echo '<p><strong>Precio:</strong> $' . number_format($row['precio'], 2) . '</p>';
                    echo '<p><strong>Stock:</strong> ' . $row['stock'] . ' unidades disponibles</p>';
                    echo '</article>';
                }
            } else {
                echo '<p>No se encontraron productos en esta categoría.</p>';
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Shamir México. Proyecto Universitario.</p>
    </footer>
</body>
</html>
