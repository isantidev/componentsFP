<?php
include '../config.php';

require ROOT_PATH . 'php/main.php';

if ($_POST) {

    $nombre = (isset($_POST['nombre_proveedor']) ? $_POST['nombre_proveedor'] : "");
    $direccion = (isset($_POST['direccion_proveedor']) ? $_POST['direccion_proveedor'] : null);
    $path_web = (isset($_POST['web_proveedor']) ? $_POST['web_proveedor'] : null);
    $contacto = (isset($_POST['contacto_proveedor']) ? $_POST['contacto_proveedor'] : null);
    $correo = (isset($_POST['correo_proveedor']) ? $_POST['correo_proveedor'] : null);

    $nombre = limpiar_cadena($nombre);
    $direccion = limpiar_cadena($direccion);
    $path_web = limpiar_cadena($path_web);
    $contacto = limpiar_cadena($contacto);
    $correo = limpiar_cadena($correo);

    $sql = "INSERT INTO proveedor (nombre, direccion, pagina_web, contacto, correo) VALUES (:nombre, :dir, :web, :contacto, :correo);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':nombre' => $nombre, ':dir' => $direccion, ':web' => $path_web, ':contacto' => $contacto, ':correo' => $correo]);
    header("Location: ../frontend/proveedor_crear.php");
}
