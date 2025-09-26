<?php include '../config.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/proveedor_list.css">
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
            <p>Lista de proveedores</p>
        </div>

        <div class="contenedor_list_proveedor">
            <div class="proveedor_fila_contenedor contenedor_titulo_fila">
                <ul class="proveedor_fila titulo_fila">
                    <li class="proveedor_columna titulo_columna">
                        <p data-text="Proveedor: ">Proveedor</p>
                    </li>
                    <li class="proveedor_columna titulo_columna">
                        <p data-text="Dirección: ">Dirección</p>
                    </li>
                    <li class="proveedor_columna titulo_columna">
                        <p data-text="Pagina web: ">Página web</p>
                    </li>
                    <li class="proveedor_columna titulo_columna">
                        <p data-text="Contacto: ">Numero de Contacto</p>
                    </li>
                    <li class="proveedor_columna titulo_columna">
                        <p data-text="Correo: ">Correo Electrónico</p>
                    </li>
                </ul>
            </div>
            <?php
            require ROOT_PATH . 'php/creador_filas_provedor.php';
            ?>
        </div>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>