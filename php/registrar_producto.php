<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $id_producto = ($_POST['codigo-producto']) ? limpiar_cadena($_POST['codigo-producto']) : false;
    $producto_nombre = ($_POST['nombre-producto']) ? limpiar_cadena($_POST['nombre-producto']) : false;
    $producto_descripcion = limpiar_cadena($_POST['descripcion-producto']);
    $precio_producto = ($_POST['precio-producto']) ? limpiar_cadena($_POST['precio-producto']) : false;
    $proveedor_id = ($_POST['select_id_proveedor'] !== 0) ? $_POST['select_id_proveedor'] : 0;

    $sql_post = "INSERT INTO producto 
        (producto_id, nombre, descripcion, precio, proveedor_id)
        VALUES (:id, :nombre, :descripcion, :precio, :proveedor)";

    $stmt = $conn->prepare($sql_post);
    $stmt->execute([
        ':id' => $id_producto,
        ':nombre' => $producto_nombre,
        ':descripcion' => $producto_descripcion,
        ':precio' => $precio_producto,
        ':proveedor' => $proveedor_id
    ]);
    header('Location: ../index.php');
}
