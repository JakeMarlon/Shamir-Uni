<?php
$conexion = new mysqli("localhost", "root", "", "shamir_db");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    // Preparar la sentencia SQL
    $sql = "INSERT INTO Contactos (nombre, email, mensaje) VALUES (?, ?, ?)";

    // Preparar la consulta
    if ($stmt = $conexion->prepare($sql)) {
        // Vincular los parámetros a la consulta preparada
        $stmt->bind_param("sss", $nombre, $email, $mensaje);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<html lang='es'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='refresh' content='3;url=index.php'> <!-- Redirección en 3 segundos -->
                        <title>Confirmación de Envío</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                text-align: center;
                                margin: 0;
                                padding: 20px;
                                background-color: #f4f4f4;
                                color: #333;
                            }
                            .message {
                                margin-top: 50px;
                                padding: 20px;
                                border: 1px solid #ddd;
                                background-color: #fff;
                                display: inline-block;
                                border-radius: 8px;
                                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                            }
                        </style>
                    </head>
                    <body>
                        <div class='message'>
                            <h1>Mensaje enviado con éxito</h1>
                            <p>Serás redirigido al inicio en unos segundos...</p>
                        </div>
                    </body>
                </html>";
            exit; // Detener la ejecución del script después de mostrar el mensaje
        } else {
            echo "Error al enviar el mensaje: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>