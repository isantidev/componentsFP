<head>
    <link rel="stylesheet" href="../styles/registrar.css">
</head>
<div class="registro-wrapper">
    <img src="/images/logo-stocksoft.png" alt="logo Stocksoft" id="logo_registro">
    <div class="title">
        <h2>Formulario de registro</h2>
        <p>registro nuevo usuario</p>
    </div>
    <form action="" class="registro-form" method="POST">
        <div class="registro-input">
            <label for="id_new_us">Número de identificación</label>
            <input type="number" name="cc-usuario" id="id_new_us" autocomplete="off">
        </div>
        <div class="registro-input input-nombre">
            <label for="nombre_new_us">Ingrese su nombre</label>
            <input type="text" name="nombre_usuario" id="nombre_new_us" autocomplete="off" minlength="3">
        </div>
        <div class="registro-input input-apellido">
            <label for="apellido_new_us">Ingrese sus apellidos</label>
            <input type="text" name="apellido_usuario" id="apellido_new_us" autocomplete="off" minlength="8">
        </div>
        <div class="registro-input">
            <label for="correo_new_us">Ingrese correo electrónico</label>
            <input type="email" name="correo_usuario" id="correo_new_us" autocomplete="off">
        </div>
        <div class="registro-input">
            <label for="contacto_new_us">Ingrese número de contacto ó teléfono </label>
            <input type="number" name="numbero_usuario" id="contacto_new_us" autocomplete="off">
        </div>
        <div class="registro-input input-contrasena">
            <label for="contrasena_new_us">Ingrese contraseña</label>
            <input type="password" name="contrasena_usuario" id="contrasena_new_us">
        </div>
        <div class="registro-input input-contrasena">
            <label for="val_contrasena_new_us">Confirme su contraseña</label>
            <input type="password" name="val_contrasena_usuario" id="val_contrasena_new_us">
        </div>
        <div class="btn-envio">
            <button type="submit">Registrar Usuario</button>
        </div>
    </form>
</div>

<!-- id: cc, nombre: full name, correo: email, 
    contacto: teléfono, contrasena, confirmacion contrasena -->