<?php
session_start(); // Para guardar datos del usuario si se necesita

$correo = $_POST['correo'];
$clave = $_POST['clave'];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "root", "bodega_reciclajedb");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Validar usuario y contraseña
$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$clave'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Usuario válido
    $_SESSION['correo'] = $correo;
    header("Location: menuPRINCIPAL.HTML"); // cuidado con mayúsculas
    exit();
} else {
    // Usuario inválido
    echo "<script>
        alert('❌ Usuario o contraseña incorrectos');
        window.location.href='login.html'; 
    </script>";
}
?>