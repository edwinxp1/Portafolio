<?php
// Credenciales de la base de datos
$servername = "localhost"; 
$username = "root";        // Tu usuario de MySQL
$password = "";            
$dbname = "portafolio_db"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// configurar el conjunto de caracteres a UTF-8
$conn->set_charset("utf8mb4");
?>