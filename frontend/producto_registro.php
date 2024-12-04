<?php
include '../config.php';
?>

<head>
    <link rel="stylesheet" href="../styles/producto_registro.css">
</head>

<div class="contenedor_titulo">
    <h2>Productos</h2>
    <p>Registro de productos</p>
</div>

<section class="registro_producto_contenedor">
    <form action="../php/registrar_producto.php" method="POST" class="producto_form">
        <div class="input_contenedor">
            <label for="codigo_producto">Código del producto</label>
            <input type="text" name="codigo-producto" id="codigo_producto" autocomplete="off">

        </div>
        <div class="input_contenedor">
            <label for="nombre_producto">Nombre del producto</label>
            <input type="text" name="nombre-producto" id="nombre_producto" autocomplete="off">

        </div>
        <div class="input_contenedor">
            <label for="descrip_producto">Descripción</label>
            <textarea type="text" name="descripcion-producto" id="descrip_producto" rows="3"></textarea>

        </div>
        <div class="input_contenedor">
            <label for="precio_producto">Ingrese precio de compra</label>
            <input type="number" name="precio-producto" id="precio_producto" autocomplete="off">

        </div>
        <div class="input_contenedor">
            <label for="select_proveedor">id - proveedor</label>
            <select name="select_id_proveedor" id="select_proveedor">
                <option value="0" disabled selected>Seleccione un proveedor</option>
                <?php
                require ROOT_PATH . 'php/main.php';

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
            <button type="submit">Registrar Producto</button>
        </div>
    </form>
</section>