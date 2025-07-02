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

// Consulta para obtener los datos
$sql = "SELECT num_factura, cod_producto, cantidad, descripcion FROM salida_materiales";
$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    echo "<h2>Listado de Salidas de Materiales</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>N° Factura</th>
            <th>Código del Producto</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Acción</th>
          </tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila["num_factura"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["cod_producto"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["cantidad"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["descripcion"]) . "</td>";
        echo "<td>
                <form method='POST' action='eliminar.php' onsubmit='return confirm(\"¿Estás seguro de eliminar este registro?\");'>
                    <input type='hidden' name='num_factura' value='" . htmlspecialchars($fila["num_factura"]) . "'>
                    <input type='submit' value='Eliminar'>
                </form>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay registros disponibles.";
}

// Cerrar conexión
$conn->close();
?>