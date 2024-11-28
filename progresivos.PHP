<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progresivos - Shamir México</title>
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
        <section id="progresivos">
            <h1>Lentes Progresivos</h1>
            <p>Descubre nuestra gama de lentes progresivos diseñados para cubrir todas las necesidades visuales con innovación y tecnología avanzada.</p>

            <?php
            // Incluir la conexión
            include 'conexion.php';

            // Consulta para obtener los productos de la categoría "Progresivos"
            $sql = "SELECT * FROM Productos WHERE categoria = 'Progresivos'";  
            $result = $conexion->query($sql);  // Ejecutar la consulta

            // Verificar si hay productos
            if ($result->num_rows > 0) {
                // Mostrar cada producto
                while ($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h2>" . $row['nombre'] . "</h2>";  // Muestra el nombre del producto
                    if ($row['imagen_url']) {
                        echo "<img src='" . $row['imagen_url'] . "' alt='" . $row['nombre'] . "' style='max-width: 50%; height: auto;'>";  // Muestra la imagen del producto
                    }
                    echo "<p><strong>Descripción:</strong> " . $row['descripcion'] . "</p>";
                    echo "<p><strong>Precio:</strong> $" . $row['precio'] . "</p>";
                    echo "<p><strong>Stock:</strong> " . $row['stock'] . "</p>";
                    echo "</article>";
                }
            } else {
                echo "<p>No hay productos disponibles en esta categoría.</p>";
            }

            // Cerrar la conexión
            $conexion->close();
            ?>
            
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Shamir México. Proyecto Universitario.</p>
    </footer>
</body>
</html>

