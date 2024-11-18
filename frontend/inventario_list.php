<?php include '../config.php' ?>

<head>
    <link rel="stylesheet" href="../styles/stock_list.css">
</head>

<div class="inventario_wrapper">
    <div class="contenedor_titulo">
        <h2>INVENTARIO</h2>
        <p>Lista de productos</p>
    </div>
    <article class="stock_utilidades_wrapper">
        <!-- search - boton agregar - btn restar - btn update productos info -->
        <p style="color: white;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat numquam placeat nemo, doloribus ipsum, sed autem neque laborum molestiae voluptates explicabo. Sit voluptas, consequatur dicta perferendis vitae velit distinctio aperiam?</p>
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
            <div class="producto_fila_contenedor">
                <ul class="producto_fila titulo_fila">
                    <li class="producto_columna">
                        <p data-text="ID: "> AB005 </p>
                    </li>
                    <li class="producto_columna">
                        <p data-text="Nombre: ">Vaso de vidrio</p>
                    </li>
                    <li class="producto_columna">
                        <p data-text="Precio: ">$720000</p>
                    </li>
                    <li class="producto_columna">
                        <p data-text="Stock: ">1</p>
                    </li>
                    <li class="producto_columna columna_descripcion">
                        <p data-text="Descripción: ">Freshly roasted, ideally within the past week or two, to ensure maximum flavor and antioxidant content.</p>
                    </li>
                </ul>
            </div>
            <?php

            ?>
        </div>
    </section>
</div>