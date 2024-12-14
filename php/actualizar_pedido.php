<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $productos_list = $_POST['productos_ids'];
    $cantidades_list = $_POST['cantidades'];
    $pedido_id = $_POST['pedido-id'];
    $proveedor_id = $_POST['proveedor-id'];

    $producto_cantidad = [];

    for ($i = 0; $i < count($productos_list); $i++) {
        $producto_cantidad[$i] = [$productos_list[$i], $cantidades_list[$i]];
    }

    $sql = 'DELETE FROM detalles_pedido WHERE pedido_id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $pedido_id]);


    for ($i = 0; $i < count($producto_cantidad); $i++) {
        $producto = $producto_cantidad[$i][0];
        $cantidad = $producto_cantidad[$i][1];
        $sql_update = 'INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, proveedor_id)
        VALUES (:id_pedido, :id_producto, :cantidad, :id_proveedor)';
        $stmt = $conn->prepare($sql_update);
        $stmt->execute([':id_pedido' => $pedido_id, ':id_producto' => $producto, ':cantidad' => $cantidad, ':id_proveedor' => $proveedor_id]);
    }

    header('Location: ../frontend/pedido_actualizar.php');
}
