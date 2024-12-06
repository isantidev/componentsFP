<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

$usuario_info = 'SELECT * FROM datos_usuario ORDER BY nombre_completo';
$stmt = $conn->prepare($usuario_info);
$stmt->execute();
$usuarios_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/usuario_actualizar.css">
</head>

<body>
    <header>
        <?php include ROOT_PATH . 'inc/nav_bar.php' ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>ACTUALIZAR INFORMACIÓN</h2>
            <p>Usuario</p>
        </div>
        <div class="wrapper_usuario_actualizar">
            <div class="selected_usuario_input">
                <label for="select_usuario_id_edit">Usuario a Editar: </label>
                <select name="select_id_usuario" id="select_usuario_id_edit">
                    <option value="" selected disabled>Seleccione un Usuario</option>
                    <?php
                    foreach ($usuarios_info as $usuario) {
                        $option_usuario = '<option value="' . $usuario['cc_id']
                            . '">' . $usuario['nombre_completo'] . '</option>';
                        echo $option_usuario;
                    }
                    ?>
                </select>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', async () => {
                    let usuarios = [];

                    try {
                        // Solicitar los datos desde usuario_info.php
                        const response = await fetch("../php/solicitud_datos/usuario_info.php");
                        usuarios = await response.json();

                        const getValueSelected = document.getElementById('select_usuario_id_edit');

                        getValueSelected.addEventListener('change', () => {
                            const currentUserId = getValueSelected.value || 0;

                            const checkerInfo = document.getElementById('current_id_usu');
                            const userNombre = document.getElementById('nombre_usu');
                            const userIdentificador = document.getElementById('identificador_usu');
                            const userContacto = document.getElementById('contacto_usu');
                            const userCorreo = document.getElementById('correo_usu');

                            const userInfo = usuarios.find(usuario => usuario.cc_id == currentUserId);
                            if (currentUserId !== 0) {
                                checkerInfo.value = userInfo.cc_id;
                                userNombre.value = userInfo.nombre_completo;
                                userIdentificador.value = userInfo.cc_id;
                                userContacto.value = userInfo.contacto;
                                userCorreo.value = userInfo.email;

                            }
                        })
                    } catch (err) {
                        console.error("No fue posible leet los datos de usuario: ", err)
                    }
                })
            </script>
            <div class="contenedor_form_usuario_actualizar">
                <form class="form_actualizar_usuario" action="../php/actualizar_usuario.php" method="post">
                    <input type="text" name="current_usuario_id" id="current_id_usu" style="display: none;">
                    <div class="contenedor_input ctn-nombre">
                        <label for="nombre_usu">Nombres Completo:</label>
                        <input type="text" name="nombre_usuario" id="nombre_usu" autocomplete="off">
                    </div>
                    <div class="contenedor_input ctn-id">
                        <label for="identificador_usu">Número de Documento:</label>
                        <input type="number" name="identificador_usuario" id="identificador_usu" min="0" autocomplete="off" required minlength="8">
                    </div>
                    <div class="contenedor_input ctn-contacto">
                        <label for="contacto_usu">Número de contacto:</label>
                        <input type="number" name="contacto_usuario" id="contacto_usu" min="0" autocomplete="off" required maxlength="10">
                    </div>
                    <div class="contenedor_input ctn-correo">
                        <label for="correo_usu">Correo:</label>
                        <input type="email" name="correo_usuario" id="correo_usu" autocomplete="off" required>
                    </div>
                    <div class="contenedor_input btn_enviar">
                        <button type="submit" id="btn-enviar">Actualizar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <?php include ROOT_PATH . 'inc/footer.php' ?>
    </footer>
</body>

</html>