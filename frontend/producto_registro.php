<?php
include '../config.php';
require ROOT_PATH . 'php/registrar_producto.php';
?>

<div class="contenedor_titulo">
    <h2>Productos</h2>
    <p>Registro de productos</p>
</div>

<section class="registro_produ_contenedor">
    <form action="../php/registrar_producto.php" method="POST">
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
            <textarea type="text" name="descripcion-producto" id="descrip_producto"></textarea>

        </div>
        <div class="input_contenedor">
            <label for="precio_producto">Ingrese precio de compra</label>
            <input type="text" name="precio-producto" id="precio_producto" autocomplete="off">

        </div>
        <div class="input_contenedor">
            <label for="select_proveedor">id - proveedor</label>
            <select name="select_id_proveedor" id="select_proveedor">
                <option value="0" disabled selected>Seleccione un proveedor</option>
                <?php
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