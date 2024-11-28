<?php
// Datos de conexión
$servername = "localhost";
$username = "root";  // Nombre de usuario de MySQL
$password = "";      // Contraseña de MySQL
$dbname = "shamir_db";  // Nombre de tu base de datos

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
