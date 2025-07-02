document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const errorMsg = document.getElementById("errorMsg");

  if (!email || !password) {
    errorMsg.textContent = "Por favor complete todos los campos.";
    errorMsg.style.display = "block";
  } else {
    errorMsg.style.display = "none";
    alert("Inicio de sesión exitoso");
    // Aquí puedes redirigir o enviar datos al backend
  }
});
// formulario entrada de materiales
document.getElementById('entradaForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const factura = document.getElementById('factura').value;
    const codigo = document.getElementById('codigo').value;
    const cantidad = document.getElementById('cantidad').value;
    const descripcion = document.getElementById('descripcion').value;

    console.log("Factura:", factura);
    console.log("Código de producto:", codigo);
    console.log("Cantidad:", cantidad);
    console.log("Descripción:", descripcion);

    alert("Datos registrados correctamente.");
});
// imagen materiales
.login-container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 20px;
}

.login-image img {
  max-width: 300px;
  height: auto;
  margin: 0; /* quita cualquier margen */
}

// accion boton cerca al search
<button onclick="window.location.href='menu.html'">Volver al Menú</button>

// accion boton cdatabse
<script>
    function toggleSubmenu() {
      const submenu = document.getElementById('submenuDatabase');
      submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    }
  </script>
