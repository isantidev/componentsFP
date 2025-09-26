<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $current_id = $_POST['current_usuario_id'];
    $usuario_id = $_POST['identificador_usuario'];
    $nombre = $_POST['nombre_usuario'];
    $contacto = $_POST['contacto_usuario'];
    $correo = $_POST['correo_usuario'];

    if ($current_id !== $usuario_id) {
        $update_id_sql = 'UPDATE datos_usuario SET cc_id = :nuevoId WHERE cc_id = :id';
        $id_update = $conn->prepare($update_id_sql);
        $id_update->execute([':nuevoId' => $usuario_id, ':id' => $current_id]);
    }

    $update_sql = 'UPDATE datos_usuario 
    SET nombre_completo = :nombre, email = :correo, contacto = :contacto
    WHERE cc_id = :id';
    $stmt = $conn->prepare($update_sql);
    $stmt->execute(
        [
            ':nombre' => $nombre,
            ':correo' => $correo,
            ':contacto' => $contacto,
            ':id' => $usuario_ids,
        ]
    );
    header('Location: ../frontend/proveedor_list.php');
}
