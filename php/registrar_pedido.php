<?php
include "../config.php";
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $pedido_id = limpiar_cadena($_POST['id_pedido']);
    $proveedor_id = $_POST['select-id-proveedor'];
    $producto_id = limpiar_cadena($_POST['select_id_producto']);
    $producto_nombre = limpiar_cadena($_POST['nombre_producto_selected']);
    $cantidad_producto = $_POST['cantidad_producto'];
    $fecha = $_POST['fecha_pedido'];

    $sql_pedido = 'INSERT INTO pedido (pedido_id, fecha, proveedor_id)
    VALUES (:id, :fecha, :proveedor)';
    $stmt_pedido = $conn->prepare($sql_pedido);
    $stmt_pedido->execute([':id' => $pedido_id, ':fecha' => $fecha, ':proveedor' => $proveedor_id]);

    $sql_detalles = 'INSERT INTO detalles_pedido (pedido_id, producto_nombre, cantidad, proveedor_id)
    VALUES (:id, :nombre_producto, :cantidad, :proveedor)';
    $stmt_detalles = $conn->prepare($sql_detalles);
    $stmt_detalles->execute([
        ':id' => $pedido_id,
        ':nombre_producto' => $producto_nombre,
        ':cantidad' => $cantidad_producto,
        'proveedor' => $proveedor_id
    ]);
    header('Location: ../frontend/pedido_list.php');
}
