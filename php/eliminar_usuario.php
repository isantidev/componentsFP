<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $id_usuario_selected = $_POST['usuario_eleccion'];
    $fecha = $_POST['usuario_eleccion_time'];
    $descripcion = $_POST['eliminacion_descripcion_usuario'];

    $delete_user_cuenta = 'DELETE FROM cuenta_usuario WHERE cc_id = :id';
    $stmt = $conn->prepare($delete_user_cuenta);
    $stmt->execute([':id' => $id_usuario_selected]);

    $detele_user = 'DELETE FROM datos_usuario WHERE cc_id = :id';
    $stmt = $conn->prepare($detele_user);
    $stmt->execute(['id' => $id_usuario_selected]);
    header('Location: ../frontend/usuario_list.php');
}
