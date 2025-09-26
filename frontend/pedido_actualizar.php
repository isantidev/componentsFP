<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

$pedidos_info = "SELECT * FROM pedido ORDER BY id";
$stmt = $conn->prepare($pedidos_info);
$stmt->execute();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include ROOT_PATH . 'inc/head.php' ?>
    <link rel="stylesheet" href="../styles/pedido_actualizar.css">
</head>

<body>
    <header>
        <?php include ROOT_PATH . 'inc/nav_bar.php'; ?>
    </header>
    <main>
        <div class="contenedor_titulo">
            <h2>Actualizar Informacion</h2>
            <p>Pedidos</p>
        </div>
        <div class="pedido_actualizar_wrapper">
            <div class="selected_pedido_wrapper">
                <label for="select_pedido_id">Pedido a Editar: </label>
                <select name="select-id-pedido" id="select_pedido_id">
                    <option value="" selected disabled>Seleccione un pedido</option>
                    <?php
                    foreach ($pedidos as $pedido) {
                        $option_pedido = '<option value="' . $pedido['pedido_id']
                            . '">' . $pedido['pedido_id'] . '</option>';
                        echo $option_pedido;
                    }
                    ?>
                </select>
            </div>
            <script>
                const getValueSelected = document.getElementById('select_pedido_id');

                document.addEventListener("DOMContentLoaded", async () => {
                    let pedidos = [];

                    try {
                        // Solicitar los datos desde pedido_info.php
                        const responsePedido = await fetch("../php/solicitud_datos/pedido_info.php");
                        pedidos = await responsePedido.json();

                        getValueSelected.addEventListener('change', () => {
                            const currentId = getValueSelected.value || 0;
                            const pedido_id = document.getElementById('pedido_id_edit');
                            const proveedor_id = document.getElementById('id_proveedor');

                            const currentPedido = pedidos.find(pedido => pedido.pedido_id == currentId);

                            if (currentId != 0) {
                                pedido_id.value = currentPedido.pedido_id;
                                proveedor_id.value = currentPedido.proveedor_id;
                            }
                        })

                    } catch (error) {
                        console.error("Error al cargar los pedidos:", error);
                        return;
                    }
                });
            </script>
            <div class="form_wrapper_pedido_actualizar">
                <form action="../php/actualizar_pedido.php" method="POST" class="pedido_actualizar_form" id="pedido-form-actualizar">
                    <h3>PEDIDO SELECCIONADO</h4>
                        <input type="text" name="pedido-id" id="pedido_id_edit" style="display: none;">
                        <div class="input_contenedor" id="dynamic_container_inputs">
                        </div>
                        <script src="../js/pedido_actualizar_input.js"></script>
                        <input type="number" name="proveedor-id" id="id_proveedor" style="display: none;">
                        <div class="input_contenedor btn-enviar">
                            <button type="submit">Actualizar Información</button>
                        </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <?php
        include ROOT_PATH . 'frontend/footer.php';
        ?>
    </footer>
</body>

</html>