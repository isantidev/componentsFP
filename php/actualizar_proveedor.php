<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

if ($_POST) {
    $proveedor_id = $_POST['proveedor_current_id'];
    $nombre = $_POST['nombre_proveedor'];
    $contacto = $_POST['contacto_proveedor'];
    $direccion = $_POST['direccion_proveedor'];
    $pagina_web = $_POST['web_proveedor'];
    $correo = $_POST['correo_proveedor'];

    $update_sql = 'UPDATE proveedor 
    SET nombre = :nombre, contacto = :contacto, direccion = :direccion, pagina_web = :web, correo = :correo
    WHERE proveedor_id = :id';
    $update = $conn->prepare($update_sql);
    $update->execute(
        [
            ':nombre' => $nombre,
            ':contacto' => $contacto,
            ':direccion' => $direccion,
            ':web' => $pagina_web,
            ':correo' => $correo,
            ':id' => $proveedor_id
        ]
    );
    header('Location: ../frontend/proveedor_list.php');
}
