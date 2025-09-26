<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $id_producto_selected = $_POST['productos_eleccion'];
    $fecha = $_POST['producto_eleccion_time'];
    $descripcion = $_POST['eliminacion_descripcion_producto'];

    $sql_delete = 'DELETE FROM producto WHERE producto_id = :id';
    $stmt = $conn->prepare($sql_delete);
    $stmt->execute([':id' => $id_producto_selected]);
    header('Location: ../frontend/inventario_list.php');
}
