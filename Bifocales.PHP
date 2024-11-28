<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Realizar una consulta para obtener productos de la categoría 'Bifocales'
$sql = "SELECT * FROM Productos WHERE categoria = 'Bifocales'";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bifocales - Shamir México</title>
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
            <h1>Bifocales - Shamir México</h1>

            <?php
            // Verificar si la consulta ha devuelto resultados
            if ($result->num_rows > 0) {
                // Recorrer los resultados y mostrarlos
                while ($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h2>" . $row['nombre'] . "</h2>";
                    echo "<img src='" . $row['imagen_url'] . "' alt='" . $row['nombre'] . "' style='max-width: 30%; height: auto;'>";
                    echo "<p><strong>Descripción:</strong> " . $row['descripcion'] . "</p>";
                    echo "</article>";
                }
            } else {
                echo "<p>No hay productos disponibles en esta categoría.</p>";
            }

            // Cerrar la conexión
            $conexion->close();
            ?>
		<article>
                <h2>Características</h2>
		<ul>
                <li><strong>Enfoque instantáneo:</strong> Transición suave entre zonas cercana y lejana.</li>
                <li><strong>Shamir Duo™</strong> permite disfrutar la estética de un progresivo y la disponibilidad de una amplia gama de materiales que una lente bifocal tradicional no tiene.</li>
		<ul>
            </article>

            <article>
                <h2>Beneficios</h2>
                <ul>
                <li>Resuelve las limitaciones de las lentes bifocales tradicionales.</li>
                <li>Aspecto impecable y juvenil.</li>
                </ul>
            </article>
	

        </section>
    </main>

    <footer>
        <p>&copy; 2024 Shamir México. Proyecto Universitario</p>
    </footer>
</body>
</html>

