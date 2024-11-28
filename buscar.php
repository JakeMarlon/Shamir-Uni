<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Productos - Shamir México</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="progresivos.php">Progresivos</a></li>
                <li><a href="bifocales.php">Bifocales</a></li>
                <li><a href="Vision_sencilla.php">Visión Sencilla</a></li>
                <li><a href="materiales_tratamientos.php">Materiales y Tratamientos</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Búsqueda de Productos</h1>
            <form action="buscar.php" method="GET">
                <input type="text" name="query" placeholder="Buscar productos..." required>
                <button type="submit">Buscar</button>
            </form>

            <?php
            if (isset($_GET['query'])) {
                $conexion = new mysqli("localhost", "tu_usuario", "tu_contraseña", "tu_base_datos");

                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                $busqueda = $conexion->real_escape_string($_GET['query']);
                $sql = "SELECT * FROM Productos WHERE nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    echo "<ul>";
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<li><strong>" . $fila['nombre'] . "</strong>: " . $fila['descripcion'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "No se encontraron resultados.";
                }

                $conexion->close();
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Shamir México. Proyecto Universitario.</p>
    </footer>
</body>
</html>
