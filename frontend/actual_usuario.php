<?php include '../config.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/cierre_sesion.css">
</head>

<body>
    <header>
        <?php include ROOT_PATH . 'inc/nav_bar.php' ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>USUARIO</h2>
            <p>Usuario Actual</p>
        </div>
        <?php

        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
        ?>

            <div class="usuario_info">
                <p><strong>ID:</strong> <?php echo htmlspecialchars($usuario['id']); ?></p>
                <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
                <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
                <p><strong>Contacto:</strong> <?php echo htmlspecialchars($usuario['contacto']); ?></p>
            </div>

            <form action="../php/cierre_sesion.php" method="post" class="form_cierre_sesion">
                <button type="submit" class="btn-logout">Cerrar Sesión</button>
            </form>

        <?php
        } else {
            header('Location: log_in.php');
            exit();
        }
        ?>
    </main>
    <footer>
        <?php include ROOT_PATH . 'inc/footer.php' ?>
    </footer>

</body>

</html>