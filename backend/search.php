<?php
include 'config.php';

// Vulnerable a XSS - Sin sanitización
$search = $_GET['q'];

// Header inseguro - permite cualquier origen
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Output sin sanitizar - XSS
echo "<h2>Resultados para: $search</h2>";

// SQL Injection en la búsqueda - Sin prepared statements
$query = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Expone detalles del error
    die('Error en la consulta: ' . mysqli_error($conn));
}

$products = array();
while($row = mysqli_fetch_assoc($result)) {
    // XSS en la salida - sin escape de datos
    $products[] = array(
        'name' => $row['name'],
        'description' => $row['description'],
        'price' => $row['price']
    );
}

// JSONP vulnerable - permite callback arbitrario
$callback = $_GET['callback'];
if($callback) {
    echo $callback . '(' . json_encode($products) . ');';
} else {
    echo json_encode($products);
}
?>