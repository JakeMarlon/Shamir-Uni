<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Shamir México</title>
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
                <li><a href="contacto.php" class="active">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Contacto</h1>
            <form action="procesar_contacto.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

                <button type="submit">Enviar Mensaje</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Shamir México. Proyecto Universitario.</p>
    </footer>
</body>
</html>
