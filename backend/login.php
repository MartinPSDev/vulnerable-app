<?php
include 'config.php';

// Vulnerable a SQL Injection - Sin sanitización de entrada
$username = $_POST['username'];
$password = $_POST['password'];

// Query vulnerable sin prepared statements
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

// Manejo inseguro de errores - Expone información sensible
if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

// Manejo inseguro de sesión
if(mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['user'] = $username; // Sin validación adicional
    echo json_encode(['status' => 'success', 'message' => 'Login successful']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
}

// Sin cierre de conexión
?>