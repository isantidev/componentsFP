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
    <link rel="stylesheet" href="../styles/pedido_registrar.css">
</head>

<body>
    <header>
        <?php include ROOT_PATH . 'inc/nav_bar.php' ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>PEDIDOS</h2>
            <p>Registrar Pedido</p>
        </div>
        <div class="wrapper_pedido_registro">
            <form action="../php/registrar_pedido.php" method="post" class="form_pedido_registro">
                <div class="input_contenedor">
                    <label for="cantidad_producto">Id de pedido: *</label>
                    <input type="text" name="id_pedido" id="pedido_id" required min="3">
                </div>
                <div class="input_contenedor contenedor_select">
                    <label for="select_proveedor_id">Id del Proveedor</label>
                    <select name="select-id-proveedor" id="select_proveedor_id" autocomplete="off">
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
                <div class="input_contenedor contenedor_select">
                    <label for="select_producto_pedido">Producto: </label>
                    <select name="select_id_producto" id="select_producto_pedido">
                        <option value="" selected disabled>Seleccione un producto</option>
                    </select>
                    <script src="../js/dinamic_pedido_select.js"></script>
                </div>
                <div class="input_contenedor">
                    <label for="cantidad_producto">Cantidad</label>
                    <input type="number" name="cantidad_producto" id="cantidad_producto" autocomplete="off" required min="1">
                </div>

                <div class="input_contenedor">
                    <label for="fecha_pedido">Fecha del pedido</label>
                    <input type="date" name="fecha_pedido" id="fecha_pedido" required>
                </div>

                <div class="input_contenedor">
                    <label for="select_usuario">ID del usuario</label>
                    <input type="number" name="usuario_id" id="select_usuario" autocomplete="off" required>
                </div>

                <div class="input_contenedor btn-enviar">
                    <button type="submit">Registrar Pedido</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php include ROOT_PATH . 'inc/footer.php' ?>
    </footer>

</body>

</html>