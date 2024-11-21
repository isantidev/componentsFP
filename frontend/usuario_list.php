<?php include '../config.php'; ?>

<head>
    <link rel="stylesheet" href="../styles/usuario_list.css">
</head>

<div class="contenedor_titulo">
    <h2>usuarios</h2>
    <p>Lista de usuarios</p>
</div>
<section class="usuario_list_contenedor">
    <?php include ROOT_PATH . "php/creador_filas.php" ?>
</section>