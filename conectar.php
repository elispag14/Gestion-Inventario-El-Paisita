<?php
// Conexión a la base de datos
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$usuario = "root";
$contrasena = "root";
$db = "bodega_reciclajedb"; // reemplaza con el nombre real

$conn = new mysqli($host, $usuario, $contrasena, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verifica si se enviaron los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_factura = $_POST['num_factura'];
    $cod_producto = $_POST['cod_producto'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    // Insertar en la base de datos
    $sql = "INSERT INTO salida_materiales (num_factura, cod_producto, cantidad, descripcion)
            VALUES ('$num_factura', '$cod_producto', '$cantidad', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro  eliminado  Paola.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>