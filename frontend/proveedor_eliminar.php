<?php
include '../config.php';
include ROOT_PATH . 'php/main.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/proveedor_eliminar.css">
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>ELIMINAR PROVEEDOR`</h2>
            <p>Formulario para Eliminar Proveedor</p>
        </div>
        <div class="proveedor_eliminar_wrapper">
            <form method="post" action="../php/eliminar_proveedor.php" class="proveedor_eliminar_form" id="form-eliminar-proveedor">
                <div class="input_contenedor">
                    <label for="proveedor_list_eleccion">Proveedor: </label>
                    <input list="proveeedor_list" name="proveedor_eleccion" id="proveedor_list_eleccion">
                    <datalist id="proveeedor_list">
                        <?php
                        require_once ROOT_PATH . 'php/solicitar_datos_func.php';

                        ['row' => $rows, 'resultado' => $datos_proveedor] = solicitarDatos("proveedor_id, nombre", "proveedor", $conn);
                        $output = "";

                        foreach ($datos_proveedor as $dato) {
                            $output =
                                '<option value="' . $dato["proveedor_id"] . '"> ' . $dato["nombre"] . '</option>';
                            echo $output;
                        }
                        ?>
                    </datalist>
                </div>
                <div class="input_contenedor">
                    <label for="eliminacion_proveedor_time">Fecha de eliminacion: </label>
                    <input type="date" name="proveedor_eleccion_time" id="eliminacion_proveedor_time">
                </div>
                <div class="input_contenedor">
                    <label for="descripcion-eliminacion-proveedor">¿Por qué elimina el proveedor?</label>
                    <textarea name="eliminacion_descripcion_proveedor" id="descripcion-eliminacion-proveedor" rows="3"></textarea>
                </div>
                <div class="input_contenedor btn-enviar">
                    <button type="submit" id="confirmar_eliminar_proveedor">Eliminar</button>
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