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


// accion boton cerca al search
<button onclick="window.location.href='menu.html'">Volver al Menú</button>

// accion boton cdatabse

      function toggleSubmenu() {
      const submenu = document.getElementById('submenuDatabase');
      submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    }

function generarComprobante() {
  const jsPDF = window.jspdf.jsPDF; // 👈 Importante para Edge y versiones modernas
  const doc = new jsPDF();

  const listaCarrito = document.getElementById("lista-carrito");
  const items = listaCarrito.querySelectorAll("li");

  if (items.length === 0) {
    alert("El carrito está vacío. No se puede generar el comprobante.");
    return;
  }

  let y = 20;
  doc.setFontSize(16);
  doc.text("Bodega de Reciclaje El Paisita", 20, y);
  y += 10;

  doc.setFontSize(12);
  doc.text("Comprobante de Compra", 20, y);
  y += 10;

  items.forEach((item, index) => {
    doc.text(`${index + 1}. ${item.textContent}`, 20, y);
    y += 10;
  });

  const total = document.getElementById("total").textContent;
  y += 10;
  doc.setFontSize(14);
  doc.text(`Total: ${total}`, 20, y);

  doc.save("comprobante_compra.pdf");
}

// 👇 NECESARIO para que esté disponible en HTML
let totalPrecio = 0;


document.addEventListener("DOMContentLoaded", () => {
  const botones = document.querySelectorAll(".producto button");
  const listaCarrito = document.getElementById("lista-carrito");
  const total = document.getElementById("total");

  botones.forEach((btn) => {
    btn.addEventListener("click", () => {
      const producto = btn.parentElement;
      const nombre = producto.querySelector("h3").innerText;
      const precioTexto = producto.querySelector("strong").innerText.replace(/\$|\.|,/g, "");
      const precio = parseInt(precioTexto);

      const item = document.createElement("li");
      item.style.display = "flex";
      item.style.justifyContent = "space-between";
      item.style.alignItems = "center";
      item.style.padding = "5px 0";

      const texto = document.createElement("span");
      texto.textContent = `${nombre} - $${precio.toLocaleString("es-CO")}`;

      const botonEliminar = document.createElement("button");
      botonEliminar.textContent = "❌";
      botonEliminar.style.backgroundColor = "#dc3545";
      botonEliminar.style.color = "white";
      botonEliminar.style.border = "none";
      botonEliminar.style.borderRadius = "4px";
      botonEliminar.style.cursor = "pointer";
      botonEliminar.style.marginLeft = "10px";

      // Acción eliminar individual
      botonEliminar.addEventListener("click", () => {
        item.remove();
        totalPrecio -= precio;
        total.textContent = `$${totalPrecio.toLocaleString("es-CO")}`;
      });

      item.appendChild(texto);
      item.appendChild(botonEliminar);
      listaCarrito.appendChild(item);

      totalPrecio += precio;
      total.textContent = `$${totalPrecio.toLocaleString("es-CO")}`;
    });
  });
});