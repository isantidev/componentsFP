<?php include '../config.php' ?>

<head>
    <link rel="stylesheet" href="../styles/inventario_list.css">
</head>

<div class="inventario_wrapper">
    <div class="contenedor_titulo">
        <h2>inventario</h2>
        <p>Lista de productos</p>
    </div>
    <article class="stock_utilidades_wrapper">
        <search class="tag_search">
            <form class="input-buscar">
                <label for="btn-search-producto">🔍</label>
                <input type="search" id="btn-search-producto">
                <button type="submit">buscar</button>
            </form>
        </search>
    </article>

    <section class="stock_list_wrapper">
        <div class="list_productos_wrapper">
            <div class="producto_fila_contenedor contenedor_titulo_fila">
                <ul class="producto_fila titulo_fila">
                    <li class="producto_columna titulo_columna">
                        <p data-text="ID: "> ID </p>
                    </li>
                    <li class="producto_columna titulo_columna">
                        <p data-text="Nombre: ">Nombre</p>
                    </li>
                    <li class="producto_columna titulo_columna">
                        <p data-text="Precio: ">Precio</p>
                    </li>
                    <li class="producto_columna titulo_columna">
                        <p data-text="Stock: ">Stock</p>
                    </li>
                    <li class="producto_columna titulo_columna">
                        <p data-text="Descripción: ">Descripción</p>
                    </li>
                </ul>
            </div>
            <?php
            require ROOT_PATH . 'php/creador_filas_inventario.php'
            ?>
        </div>
    </section>
</div>