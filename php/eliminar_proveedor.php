<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $id_proveedor_selected = $_POST['proveedor_eleccion'];
    $fecha = $_POST['proveedor_eleccion_time'];
    $descripcion = $_POST['eliminacion_descripcion_proveedor'];

    $sql_delete = 'DELETE FROM proveedor WHERE proveedor_id = :id';
    $stmt = $conn->prepare($sql_delete);
    $stmt->execute([':id' => $id_proveedor_selected]);
    header('Location: ../frontend/proveedor_list.php');
}
