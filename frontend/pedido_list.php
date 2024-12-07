<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/pedido_list.css">
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>PEDIDOS</h2>
            <p>Lista de pedidos</p>
        </div>
        <section class="contenedor_list_pedido">
            <div class="pedido_fila_contenedor contenedor_titulo_fila">
                <ul class="pedido_fila titulo_fila">
                    <li class="pedido_columna titulo_columna">
                        <p data-text="Id del pedido: ">Id del pedido</p>
                    </li>
                    <li class="pedido_columna titulo_columna">
                        <p data-text="Productos: ">Productos</p>
                    </li>
                    <li class="pedido_columna titulo_columna">
                        <p data-text="Fecha: ">Fecha</p>
                    </li>
                    <li class="pedido_columna titulo_columna">
                        <p data-text="Proveedor ID: ">Proveedor ID</p>
                    </li>
                </ul>
            </div>
            <?php include ROOT_PATH . "php/creador_filas_pedido.php" ?>
        </section>
    </main>
    <footer>
        hola
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>