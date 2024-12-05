<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/stock_actualizar.css">
</head>

<body>
    <header>
        <?php
        include ROOT_PATH . 'inc/nav_bar.php';
        ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2 class="title">Productos</h2>
            <p class="subtitle">Disminuir stock de productos</p>
        </div>

        <article class="contenedor_form_stock">
            <?php require ROOT_PATH . 'php/check_datos_actualizar.php' ?>
            <form action="/php/stock_actualizar_process.php" method="post" class="form_stock">
                <input type="hidden" name="proceso" value="resta" class="stock_input">
                <div class="stock_input">
                    <label for="select_produ">id - producto</label>
                    <select name="productos" id="select_produ" class="select" required>
                        <option value="">Seleciona un producto</option>
                        <?php
                        $optionProducto = '';
                        foreach ($productos as $producto) {
                            $id = $producto['producto_id'];
                            $nombre = $id . " - " . $producto['nombre'];
                            $optionProducto = '<option value="' . $id . '">' . $nombre . '</option>';
                            echo $optionProducto;
                        }
                        ?>
                    </select>
                </div>
                <div class="stock_input">
                    <label for="cantidad_producto">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad_producto" min="1" placeholder="0" required>
                </div>
                <div class="stock_input">
                    <label for="fecha_update_produ">Fecha de actualizacion</label>
                    <input type="date" name="fecha" id="fecha_update_produ" required>
                </div>
                <div class="stock_input">
                    <label for="select_usuarios">Usuarios</label>
                    <select name="usuarios" id="select_usuarios" class="select" required>
                        <option value="">Seleciona un usuario</option>
                        <?php
                        $optionUsuario = '';
                        foreach ($usuarios as $usuario) {
                            $id = $usuario['cc_id'];
                            $nombre = $id . " - " . $usuario['nombre_completo'];
                            $optionUsuario = "<option value='$id'> $nombre </option>";
                            echo $optionUsuario;
                        }
                        ?>
                    </select>
                </div>
                <div class="stock_input btn_enviar">
                    <button type="submit" class="stock_input btn_enviar">Actualizar Stock</button>
                </div>
            </form>
        </article>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>