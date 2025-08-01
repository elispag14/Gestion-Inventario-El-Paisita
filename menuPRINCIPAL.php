<?php
session_start();

// Proteger el acceso si no ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header("Location: login.html");
    exit();
}

$correo = $_SESSION['correo']; // Correo del usuario logueado
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Menú Principal</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

  <header>
    <div class="header-contenido">
      <div class="texto-header">
        <span class="titulo-principal">Gestor de Inventario</span><br>
        <span class="subtitulo">El Paisita</span>
      </div>
      <img src="images/logo.png" alt="Logo" class="logo">
    </div>
  </header>

  <main>
    <div class="contenido">
      <h2>Bienvenida, <?php echo $correo; ?> 👋</h2>

      <ul>
        <li><a href="#">Registro</a></li>
        <li><a href="#">Historial</a></li>
        <li><a href="#">Entrada de Stock</a></li>
        <li><a href="#">Salida de Stock</a></li>
        <li><a href="#">Reportes</a></li>
        <li><a href="logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-right">
      <span>Síguenos en redes sociales</span>
      <a href="#"><img src="images/telegram-icon.png" alt="Telegram"></a>
      <a href="#"><img src="images/instagram-icon.png" alt="Instagram"></a>
      <a href="#"><img src="images/linkedin-icon.png" alt="LinkedIn"></a>
      <a href="#"><img src="images/facebook-icon.png" alt="Facebook"></a>
    </div>
  </footer>

</body>
</html>