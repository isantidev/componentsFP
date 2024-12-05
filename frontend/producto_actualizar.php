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
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/producto_actualizar.css">
</head>

<body>
    <header>
        <?php include ROOT_PATH . 'inc/nav_bar.php'; ?>
    </header>
    <main>
        <div class="producto_actualizar_wrapper">
            <div class="selected_producto_input">
                <label for="select_elemento_edit"></label>
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
            <div id="info_selected_wrapper"></div>
        </div>
        <form action="../php/registrar_producto.php" method="post" class="producto_actualizar_form">
            <div class="input_contenedor">
                <label for="producto_id_edit">Id del Producto</label>
                <input type="text" name="producto-id" id="producto_id_edit">
            </div>
            <div class="input_contenedor">
                <label for="producto_nombre_edit">Nombre del producto</label>
                <input type="text" name="producto-nombre" id="producto_nombre_edit">
            </div>
            <div class="input_contenedor">
                <label for="producto_descripcion_edit">Descrición del Producto</label>
                <input type="text" name="producto-descripcion" id="producto_descripcion_edit">
            </div>
            <div class="input_contenedor">
                <label for="producto_precio_edit">Precio del producto</label>
                <input type="number" name="producto-precio" id="producto_precio_edit">
            </div>
            <div class="input_contenedor">
                <label for="select_proveedor_id_edit">Id del Proveedor</label>
                <select name="select-id-proveedor" id="select_proveedor_id_edit">
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
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>