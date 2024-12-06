<?php
include '../config.php';
include ROOT_PATH . 'php/main.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/usuario_eliminar.css">
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>ELIMINAR USUARIO</h2>
            <p>Formulario para Eliminar Usuario</p>
        </div>
        <div class="usuario_eliminar_wrapper">
            <form method="post" action="../php/eliminar_usuario.php" class="usuario_eliminar_form" id="form-eliminar-usuario">
                <div class="input_contenedor">
                    <label for="usuario_list_eleccion">Usuario: </label>
                    <input list="usuario_list" name="usuario_eleccion" id="usuario_list_eleccion">
                    <datalist id="usuario_list">
                        <?php
                        require_once ROOT_PATH . 'php/solicitar_datos_func.php';

                        ['row' => $rows, 'resultado' => $datos_usuario] = solicitarDatos("cc_id, nombre_completo", "datos_usuario", $conn);
                        $output = "";

                        foreach ($datos_usuario as $dato) {
                            $output =
                                '<option value="' . $dato["cc_id"] . '"> ' . $dato["nombre_completo"] . '</option>';
                            echo $output;
                        }
                        ?>
                    </datalist>
                </div>
                <div class="input_contenedor">
                    <label for="eliminacion_usuario_time">Fecha de eliminacion: </label>
                    <input type="date" name="usuario_eleccion_time" id="eliminacion_usuario_time">
                </div>
                <div class="input_contenedor">
                    <label for="descripcion-eliminacion_usuario">¿Por qué elimina el usuario?</label>
                    <textarea name="eliminacion_descripcion_usuario" id="descripcion-eliminacion_usuario" rows="3"></textarea>
                </div>
                <div class="input_contenedor btn-enviar">
                    <button type="submit" id="confirmar_eliminar_usuario">Eliminar</button>
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