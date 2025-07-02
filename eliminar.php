<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Datos de conexión
$host = "localhost";
$usuario = "root";
$contrasena = "root";
$db = "bodega_reciclajedb";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener y limpiar el num_factura de forma segura
    $id = trim($_POST['num_factura'] ?? '');

    if (empty($id)) {
        die("ID inválido.");
    }

    $stmt = $conn->prepare("DELETE FROM salida_materiales WHERE num_factura = ?");
    $stmt->bind_param("s", $id);  // "s" porque es string (ej: FAC001)

    if ($stmt->execute()) {
        echo "Registro eliminado correctamente Paola";
    } else {
        echo "Error al eliminar: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Método no permitido.";
}

$conn->close();
?>