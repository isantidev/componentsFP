<?php include '../config.php' ?>

<head>
    <link rel="stylesheet" href="../styles/proveedor_list.css">
</head>

<div class="contenedor_titulo">
    <h1>Proveedor</h1>
    <h2>Lista de proveedores</h2>
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