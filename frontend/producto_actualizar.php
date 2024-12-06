<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

$producto_info = "SELECT * FROM producto ORDER BY nombre";
$stmt = $conn->prepare($producto_info);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/producto_actualizar.css">
</head>

<body>
    <header>
        <?php include ROOT_PATH . 'inc/nav_bar.php'; ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>Actualizar Informacion</h2>
            <p>Productos</p>
        </div>
        <div class="producto_actualizar_wrapper">
            <div class="selected_producto_input">
                <label for="select_elemento_edit">Producto a Editar: </label>
                <select name="select_id_producto" id="select_elemento_edit">
                    <option value="" selected disabled>Seleccione un producto</option>
                    <?php
                    foreach ($productos as $producto) {
                        $option_producto = '<option value="' . $producto['producto_id']
                            . '">' . $producto['nombre'] . '</option>';
                        echo $option_producto;
                    }
                    ?>
                </select>
            </div>
            <script>
                const getValueSelected = document.getElementById('select_elemento_edit');

                document.addEventListener("DOMContentLoaded", async () => {
                    let productos = [];

                    try {
                        // Solicitar los datos desde producto_info.php
                        const response = await fetch("../php/producto_info.php");
                        productos = await response.json();

                        getValueSelected.addEventListener('change', () => {
                            const currentProductoId = getValueSelected.value || 0;
                            const elemento_info = document.getElementById('info-producto-selected');
                            const inputProductoId = document.getElementById('producto_id_edit');
                            const inputProductoNombre = document.getElementById('producto_nombre_edit');
                            const inputProductoDescripcion = document.getElementById('producto_descripcion_edit');
                            const inputProductoPrecio = document.getElementById('producto_precio_edit');
                            const inputProveedorId = document.getElementById('select_proveedor_id_edit');

                            const current_producto = productos.find(producto => producto.producto_id == currentProductoId);

                            if (currentProductoId !== 0) {
                                elemento_info.value = currentProductoId;
                                inputProductoId.value = current_producto.producto_id;
                                inputProductoNombre.value = current_producto.nombre;
                                inputProductoDescripcion.value = current_producto.descripcion;
                                inputProductoPrecio.value = current_producto.precio;
                                inputProveedorId.value = current_producto.proveedor_id;
                            }
                        })

                    } catch (error) {
                        console.error("Error al cargar los productos:", error);
                        return;
                    }
                });
            </script>
            <div class="form_wrapper_producto_actualizar">
                <form action="../php/actualizar_producto.php" method="POST" class="producto_actualizar_form">
                    <h4>PRODUCTO SELECCIONADO</h4>
                    <input type="text" name="info_producto_selected" id="info-producto-selected" style="display: none;">
                    <div class="input_contenedor">
                        <label for="producto_id_edit">Id del Producto</label>
                        <input type="text" name="producto-id" id="producto_id_edit" autocomplete="off">
                    </div>
                    <div class="input_contenedor">
                        <label for="producto_nombre_edit">Nombre del producto</label>
                        <input type="text" name="producto-nombre" id="producto_nombre_edit" autocomplete="off">
                    </div>
                    <div class="input_contenedor">
                        <label for="producto_descripcion_edit">Descrición del Producto</label>
                        <input type="text" name="producto-descripcion" id="producto_descripcion_edit" autocomplete="off">
                    </div>
                    <div class="input_contenedor">
                        <label for="producto_precio_edit">Precio del producto</label>
                        <input type="number" name="producto-precio" id="producto_precio_edit" autocomplete="off">
                    </div>
                    <div class="input_contenedor contenedor_select">
                        <label for="select_proveedor_id_edit">Id del Proveedor</label>
                        <select name="select-id-proveedor" id="select_proveedor_id_edit" autocomplete="off">
                            <option value="" selected disabled>Seleccione un proveedor</option>
                            <?php
                            $sql_info_proveedor = "SELECT proveedor_id, nombre FROM proveedor";
                            $stmt_info_proveedor = $conn->prepare($sql_info_proveedor);
                            $stmt_info_proveedor->execute();
                            $proveedores = $stmt_info_proveedor->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($proveedores as $proveedor) {
                                $option_proveedor = '<option value="' . $proveedor['proveedor_id'] . '">' . $proveedor['nombre'] . '</option>';
                                echo $option_proveedor;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input_contenedor btn-enviar">
                        <button type="submit">Actualizar Información</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>