<?php
// Configuración insegura de base de datos
$db_host = 'localhost';
$db_user = 'admin';
$db_pass = 'admin123'; // Credenciales hardcodeadas
$db_name = 'vulnerable_db';

// Configuración insegura sin manejo de errores
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Display de errores habilitado (inseguro)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>