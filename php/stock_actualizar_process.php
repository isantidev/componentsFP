<?php
include '../config.php';

require ROOT_PATH . 'php/main.php';

function actualizarStock($conexion, $proceso, $producto, $cantidad)
{
    $sql = "SELECT stock FROM producto_stock WHERE producto_id = :producto_id;";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':producto_id', $producto);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $cantidad = intval($cantidad);
    $stock = $result['stock'];
    $stock = intval($stock);
    $nuevo_stock = 0;

    if ($proceso === "adicion") {
        $nuevo_stock = $stock + $cantidad;
    } else if ($proceso === "resta" && $stock >= $cantidad) {
        $nuevo_stock = $stock - $cantidad;
    } else if ($stock < $cantidad) {
        echo 'se jodio la vaina';
        exit();
    }

    $sql_update = "UPDATE producto_stock SET stock = :nuevo WHERE producto_id = :producto_id;";
    $stmt = $conexion->prepare($sql_update);
    if ($stmt->execute([':nuevo' => $nuevo_stock, ':producto_id' => $producto])) {
        echo 'se logro';
    } else {
        echo 'no se logro';
    }
}

function registrarModificacionStock($conexion, $proceso, $producto, $cantidad, $fecha, $usuario)
{
    $tabla = $proceso == "adicion" ? "ingreso_producto" : "salida_producto";
    $campo_fecha = $proceso == "adicion" ? "ingreso_fecha" : "salida_fecha";
    $cantidad = intval($cantidad);

    $sql = "INSERT INTO $tabla (producto_id, cantidad, $campo_fecha, usuario_id) VALUES (:producto_id, :cantidad, :fecha, :usuario_id);";
    $stmt = $conexion->prepare($sql);

    if ($stmt->execute([':producto_id' => $producto, ':cantidad' => $cantidad, ':fecha' => $fecha, ':usuario_id' => $usuario])) {
        echo 'casi se logro';
    } else {
        echo 'no se logro';
    }
}

if ($_POST) {
    $proceso = (isset($_POST['proceso']) ?  $_POST['proceso'] : "");
    $producto_id = (isset($_POST['productos']) ?  $_POST['productos'] : "");
    $cantidad = (isset($_POST['cantidad']) ?  $_POST['cantidad'] : "");
    $fecha = (isset($_POST['fecha']) ?  $_POST['fecha'] : "");
    $usuario_id = (isset($_POST['usuarios']) ?  $_POST['usuarios'] : "");

    $cantidad = limpiar_cadena($cantidad);

    $sql_check = "SELECT COUNT(*) FROM producto_stock WHERE producto_id = :producto_id";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->execute([':producto_id' => $producto_id]);
    $exists = $stmt_check->fetchColumn();

    if ($exists) {
        // If the product ID exists, update the stock
        actualizarStock($conn, $proceso, $producto_id, $cantidad);
    } else {
        // If the product ID does not exist, insert a new record
        $sql_insert = "INSERT INTO producto_stock (producto_id, stock) VALUES (:producto, :stock)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->execute([':producto' => $producto_id, ':stock' => $cantidad]);
    }

    registrarModificacionStock($conn, $proceso, $producto_id, $cantidad, $fecha, $usuario_id);
    header("Location: ../frontend/usuario_list.php");
}
