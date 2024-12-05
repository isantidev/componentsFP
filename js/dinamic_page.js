document.addEventListener("DOMContentLoaded", async () => {
    const navLinks = document.querySelectorAll("a[data-document]");
    const contentDiv = document.getElementById("content");
    const defaultDocument = "../frontend/stocksoft.php";

    const loadDocument = async (documentPath) => {
        try {
            const response = await fetch(documentPath);
            if (!response.ok) {
                throw new Error(`Fallo al cargar ${documentPath}: ${response}`);
            }
            const content = await response.text();
            contentDiv.innerHTML = content;
        } catch (error) {
            contentDiv.innerHTML = `<p>${error.message}</p>`;
        }
    };

    await loadDocument(defaultDocument);

    navLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const documentPath = link.getAttribute("data-document");
            loadDocument(documentPath);
        });
    });
});

document.addEventListener("DOMContentLoaded", async () => {
    let productos = [];

    try {
        // Solicitar los datos desde producto_info.php
        const response = await fetch("../php/producto_info.php");
        productos = await response.json();
        console.log("Productos cargados:", productos);
    } catch (error) {
        console.error("Error al cargar los productos:", error);
        return;
    }
});

const producto_selected = document.getElementById("select_producto_edit");
const detalles_contenedor = document.getElementById("info_selected_wrapper");

producto_selected.addEventListener("change", () => {
    const productoIdSelected = producto_selected.value;
    detalles_contenedor.innerHTML = "";

    const selectedProducto = productos.find(
        (producto) => producto.producto_id === productoIdSelected
    );

    if (selectedProducto) {
        detalles_contenedor.style.display = "block";
        detalles_contenedor.innerHTML = `
                <h4>${selectedProducto.producto_id} - ${
            selectedProducto.nombre
        }</h4>
                <ul class="list_producto_info">
                    <li class="producto_info_item">
                        <p><strong>Precio:</strong> ${
                            selectedProducto.precio
                        }</p>
                    </li>
                    <li class="producto_info_item">
                        <p><strong>Descripción:</strong> ${
                            selectedProducto.descripcion || "No disponible"
                        }</p>
                    </li>
                    <li class="producto_info_item">
                        <p><strong>ID de Proveedor:</strong> ${
                            selectedProducto.proveedor_id
                        }</p>
                    </li>
                </ul>
            `;
    } else {
        detalles_contenedor.style.display = "none";
    }
});
