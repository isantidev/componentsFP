<?php include '../config.php'; ?>

<head>
    <link rel="stylesheet" href="/styles/usuario_crear.css">
</head>
<div class="contenedor_titulo">
    <h2>USUARIOS</h2>
    <p>Agregar usuario</p>
</div>

<div class="contenedor_form_crear_usuario">
    <?php require ROOT_PATH . 'php/registrar_usuario.php' ?>
    <form class="form_crear_usuario" action="../php/registrar_usuario.php" method="post">
        <div class="contenedor_input ctn-nombre">
            <label for="nombre_usu">Nombres:</label>
            <input type="text" name="nombre_usuario" id="nombre_usu" autocomplete="off" required minlength="3">
        </div>
        <div class="contenedor_input ctn-apellido">
            <label for="apellido_usu">Apellidos: </label>
            <input type="text" name="apellido_usuario" id="apellido_usu" autocomplete="off" required>
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
        <div class="contenedor_input ctn-contrasena">
            <label for="contrasena_usu">Contraseña:</label>
            <input type="password" name="contrasena_usuario" id="contrasena_usu" autocomplete="off" required>
        </div>

        <div class="contenedor_input btn_enviar">
            <button type="submit" id="btn-enviar">Agregar Usuario</button>
        </div>
    </form>
</div>