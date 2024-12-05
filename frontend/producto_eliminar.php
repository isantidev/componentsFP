<?php
include '../config.php';
include ROOT_PATH . 'php/main.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
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
        <div class="producto_eliminar_wrapper">
            <form action="post" class="producto_eliminar_form" id="form-eliminar-producto">
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
                <input type="datetime" name="producto_eleccion_time" id="eliminacion_producto_time">
                <textarea name="eliminacion_descripcion_producto" id="descripcion-eliminacion-produ" rows="5"></textarea>
                <button type="submit" id="confirmar_eliminar_producto">Eliminar</button>
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