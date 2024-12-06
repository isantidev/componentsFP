<?php
include '../config.php';
include ROOT_PATH . 'php/main.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/producto_eliminar.css">
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>ELIMINAR PRODUCTO</h2>
            <p>Formulario para Eliminar producto</p>
        </div>
        <div class="producto_eliminar_wrapper">
            <form method="post" action="../php/eliminar_producto.php" class="producto_eliminar_form" id="form-eliminar-producto">
                <div class="input_contenedor">
                    <label for="producto_list_eleccion">Producto: </label>
                    <input list="productos_list" name="productos_eleccion" id="productos_list_eleccion">
                    <datalist id="productos_list">
                        <?php
                        require_once ROOT_PATH . 'php/solicitar_datos_func.php';

                        ['row' => $rows, 'resultado' => $datos_producto] = solicitarDatos("producto_id, nombre", "producto", $conn);
                        $output = "";

                        foreach ($datos_producto as $dato) {
                            $output =
                                '<option value="' . $dato["producto_id"] . '"> ' . $dato["nombre"] . '</option>';
                            echo $output;
                        }
                        ?>
                    </datalist>
                </div>
                <div class="input_contenedor">
                    <label for="eliminacion_producto_time">Fecha de eliminacion: </label>
                    <input type="date" name="producto_eleccion_time" id="eliminacion_producto_time">
                </div>
                <div class="input_contenedor">
                    <label for="descripcion-eliminacion_produ">¿Por qué elimina el producto?</label>
                    <textarea name="eliminacion_descripcion_producto" id="descripcion-eliminacion-produ" rows="3"></textarea>
                </div>
                <div class="input_contenedor btn-enviar">
                    <button type="submit" id="confirmar_eliminar_producto">Eliminar</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>