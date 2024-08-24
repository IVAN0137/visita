<?php
$servername = "localhost";
$username = "root"; // Cambia estos valores según tu configuración
$password = "";
$dbname = "guia_turistico"; // Asegúrate de tener esta base de datos creada

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

