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
