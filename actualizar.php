<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "root", "bodega_reciclajedb");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num_factura = $_POST['num_factura'] ?? '';
    $cod_producto = $_POST['cod_producto'] ?? '';

    // Validar campos obligatorios Paola
    if (!$num_factura || !$cod_producto) {
        die("num_factura y cod_producto son obligatorios.");
    }

    $verifica = $conn->prepare("SELECT * FROM salida_materiales WHERE num_factura = ?");
$verifica->bind_param("s", $num_factura);
$verifica->execute();
$resultado = $verifica->get_result();

if ($resultado->num_rows === 0) {
    die("⚠️ No se encontró ningún registro con ese número de factura.");
}
    // Prepara la consulta para actualizar solo cod_producto
    $stmt = $conn->prepare("UPDATE salida_materiales SET cod_producto = ? WHERE num_factura = ?");
    $stmt->bind_param("ss", $cod_producto, $num_factura);

    if ($stmt->execute()) {
        echo "Código de producto actualizado correctamente.";
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Método no permitido.";
}

$conn->close();
?>