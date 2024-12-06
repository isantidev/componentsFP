<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/usuario_list.css">
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>usuarios</h2>
            <p>Lista de usuarios</p>
        </div>
        <section class="usuario_list_contenedor">
            <?php include ROOT_PATH . "php/creador_filas.php" ?>
        </section>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>