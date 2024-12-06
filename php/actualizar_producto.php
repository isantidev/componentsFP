<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $id_security = $_POST['info_producto_selected'];
    $producto_id = $_POST['producto-id'];
    $producto_nombre = $_POST['producto-nombre'];
    $producto_descripcion = $_POST['producto-descripcion'];
    $producto_precio = $_POST['producto-precio'];
    $id_proveedor = $_POST['select-id-proveedor'];

    if ($id_security !== $producto_id) {
        $update_id_sql = 'UPDATE producto SET producto_id = :nuevoId WHERE producto_id = :id';
        $id_update = $conn->prepare($update_id_sql);
        $id_update->execute(['nuevoId' => $producto_id, 'id' => $id_security]);
    }
    $update_sql = 'UPDATE producto 
        SET nombre = :nombre, descripcion = :descripcion, precio = :precio, proveedor_id = :proveedor
        WHERE producto_id = :id';
    $update = $conn->prepare($update_sql);
    $update->execute(
        [
            ':nombre' => $producto_nombre,
            ':descripcion' => $producto_descripcion,
            ':precio' => $producto_precio,
            ':proveedor' => $id_proveedor,
            ':id' => $producto_id
        ]
    );
    header('Location: ../frontend/producto_actualizar.php');
}
