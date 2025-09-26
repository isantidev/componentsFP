const getValue = document.getElementById("select_pedido_id");

document.addEventListener("DOMContentLoaded", async () => {
    let detalles = [];
    let productos = [];

    try {
        const responseDetalles = await fetch(
            "../php/solicitud_datos/detalles_pedido_info.php"
        );

        detalles = await responseDetalles.json();

        const responseProductos = await fetch(
            "../php/solicitud_datos/producto_info.php"
        );

        productos = await responseProductos.json();

        getValue.addEventListener("change", () => {
            const containerInputs = document.getElementById(
                "dynamic_container_inputs"
            );
            console.log("ayudaaaa");
            containerInputs.innerHTML = "";

            const titulo = document.createElement("p");
            titulo.innerText = "Productos enlistados: ";
            containerInputs.appendChild(titulo);

            const contenedor_leyendas = document.createElement("div");
            contenedor_leyendas.setAttribute("class", "dynamic_input leyenda");

            const leyendaNombre = document.createElement("p");
            leyendaNombre.innerText = "Nombre: ";
            const leyendaCantidad = document.createElement("p");
            leyendaCantidad.innerText = "Cantidad: ";

            contenedor_leyendas.appendChild(leyendaNombre);
            contenedor_leyendas.appendChild(leyendaCantidad);

            containerInputs.appendChild(contenedor_leyendas);

            for (let { pedido_id, producto_id, cantidad } of detalles) {
                if (pedido_id !== getValue.value) continue;

                const contenedor_input = document.createElement("div");
                contenedor_input.setAttribute("class", "dynamic_input");

                const element_nombre = document.createElement("input");
                element_nombre.type = "text";
                element_nombre.name = "productos_ids[]";
                element_nombre.setAttribute("readonly", "");
                element_nombre.value = producto_id || 0;

                const element_cantidad = document.createElement("input");
                element_cantidad.type = "number";
                element_cantidad.min = "1";
                element_cantidad.name = "cantidades[]";
                element_cantidad.value = cantidad || 0;

                contenedor_input.appendChild(element_nombre);
                contenedor_input.appendChild(element_cantidad);

                containerInputs.appendChild(contenedor_input);
            }

            // Add a button to create new inputs
            const addButton = document.createElement("button");
            addButton.type = "button";
            addButton.innerText = "Agregar producto";
            addButton.setAttribute("class", "add_button");
            containerInputs.appendChild(addButton);

            // Add event listener to the button
            addButton.addEventListener("click", () => {
                const contenedor_input = document.createElement("div");
                contenedor_input.setAttribute("class", "dynamic_input");

                const element_nombre_select = document.createElement("select");
                element_nombre_select.setAttribute("class", "dynamic_select");
                element_nombre_select.name = "productos_ids[]";

                contenedor_input.appendChild(element_nombre_select);

                const proveedor = document.getElementById("id_proveedor").value;

                for (let { producto_id, nombre, proveedor_id } of productos) {
                    if (proveedor_id == proveedor) {
                        const element_nombre = document.createElement("option");
                        element_nombre.value = producto_id;
                        element_nombre.innerText = nombre;

                        element_nombre_select.appendChild(element_nombre);
                    }
                }

                const element_cantidad = document.createElement("input");
                element_cantidad.type = "number";
                element_cantidad.name = "cantidades[]";
                element_cantidad.min = "1";
                element_cantidad.placeholder = "Cantidad";

                contenedor_input.appendChild(element_cantidad);

                containerInputs.appendChild(contenedor_input);
            });
        });
    } catch (err) {
        console.error("Error al cargar los detalles del pedido: ", err);
    }
});
