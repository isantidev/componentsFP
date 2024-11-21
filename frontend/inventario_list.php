<?php include '../config.php' ?>

<head>
    <link rel="stylesheet" href="../styles/inventario_list.css">
</head>

<div class="inventario_wrapper">
    <div class="contenedor_titulo">
        <h2>INVENTARIO</h2>
        <p>Lista de productos</p>
    </div>
    <article class="stock_utilidades_wrapper">
        <!-- search - boton agregar - btn restar - btn update productos info -->
        <search class="tag_search">
            <form class="input-buscar">
                <label for="btn-search-producto">🔍</label>
                <input type="search" id="btn-search-producto">
                <button type="submit">buscar</button>
            </form>
        </search>
        <div class="btn_links_wrapper">
            <label class="utilidad_producto actualizar_info_producto">
                <a href="../frontend/producto_actualizar_info.php">Editar producto</a>
            </label>
            <label class="utilidad_producto agregar_stock_producto">
                <a href="../frontend/stock_adicion.php">Agregar stock</a>
            </label>
            <label class="utilidad_producto disminuir_stock_producto">
                <a href="../frontend/stock_resta.php">Disminuir stock</a>
            </label>
            <label class="utilidad_producto Eliminar_producto">
                <a href="../frontend/producto_eliminar.php">Eliminar producto</a>
            </label>
        </div>
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