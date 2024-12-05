<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/proveedor_registrar.css">
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>Proveedor</h2>
            <p>Registrar datos del proveedor</p>
        </div>

        <div class="contenedor_form_proveedor">
            <form action="../php/registrar_proveedor.php" class="proveedor_form" method="post">
                <div class="contenedor_input ctn-nombre">
                    <label for="nombre_prove">Nombre del proveedor:</label>
                    <input type="text" name="nombre_proveedor" id="nombre_prove" placeholder="Stocksoft Productos" autocomplete="off" required>
                </div>
                <div class="contenedor_input ctn-contacto">
                    <label for="contacto_prove">Contacto del proveedor:</label>
                    <input type="number" name="contacto_proveedor" id="contacto_prove" placeholder="3001112233" autocomplete="off" required>
                </div>
                <div class="contenedor_input ctn-direccion">
                    <label for="direccion_prove">Direccion del proveedor:<strong style="font-weight:300; font-style: italic; color: var(--text-80);"> (En caso de no contar con página web) </strong></label>
                    <input type="text" name="direccion_proveedor" id="direccion_prove" placeholder="Calle 0 # 00 - 00, Bogotá" autocomplete="off">
                </div>
                <div class="contenedor_input ctn-web">
                    <label for="direccion_prove">Página web del proveedor: <strong style="font-weight:300; font-style: italic; color: var(--text-80);"> (En caso de no contar con punto físico) </strong> </label>
                    <input type="text" name="web_proveedor" id="web_prove" placeholder="www.stocksoft.com" autocomplete="off">
                </div>
                <div class="contenedor_input ctn-correo">
                    <label for="correo_prove">Correo del proveedor:<strong style="font-weight:300; font-style: italic; color: var(--text-80);"> (Opcional) </strong></label>
                    <input type="email" name="correo_proveedor" id="correo_prove" placeholder="stocksoft@example.com" autocomplete="off">
                </div>

                <div class="contenedor_input btn_enviar">
                    <button type="submit">Registrar proveedor</button>
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