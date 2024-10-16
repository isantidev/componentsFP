<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

$sql_info_proveedor = "SELECT proveedor_id, nombre FROM proveedor";
$stmt_info_proveedor = $conn->prepare($sql_info_proveedor);
$stmt_info_proveedor->execute();
$proveedores = $stmt_info_proveedor->fetchAll(PDO::FETCH_ASSOC);

if ($_POST) {
    print_r($_POST);

    $id_producto = ($_POST['codigo_producto']) ? isset($_POST['codigo_producto']) : false;
    $producto_nombre = ($_POST['nombre_producto']) ? isset($_POST['nombre_producto']) : false;
    $producto_descricion = ($_POST['descrip_producto']) ? isset($_POST['descrip_producto']) : false;
    $precio_producto = ($_POST['precio_producto']) ? isset($_POST['precio_producto']) : false;
    $proveedor_id = ($_POST['select_proveedor'] !== 0) ? $_POST['select_proveedor'] : false;

    echo ($id_producto);
    echo ($proveedor_id);

    if (
        $id_producto === false ||
        $producto_nombre === false ||
        $producto_descricion === false ||
        $precio_producto === false ||
        $proveedor_id === false
    ) {
        // header('Location: ../frontend/producto_registro.php');
    }
}
