<?php
include '../config.php';

require ROOT_PATH . 'php/main.php';

function checkProducto($conexion)
{
    $sql = "SELECT producto_id, nombre FROM producto";
    $stmt = $conexion->prepare($sql);

    if ($stmt->execute()) {
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    } else {
        echo "no se que pasa";
    }

    return [];
}

function checkUsuario($conexion)
{
    $sql = "SELECT cc_id ,nombre_completo FROM datos_usuario";
    $stmt = $conexion->prepare($sql);

    if ($stmt->execute()) {
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    } else {
        echo "no se que pasa 3";
    }

    return [];
}

$productos = checkProducto($conn);
$usuarios = checkUsuario($conn);
