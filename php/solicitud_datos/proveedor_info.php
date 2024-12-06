<?php
include "../../config.php";
require ROOT_PATH . 'php/main.php';

$proveedor_info = 'SELECT * FROM proveedor';
$stmt = $conn->prepare($proveedor_info);
$stmt->execute();
$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json_data = json_encode($proveedores, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

header('Content-Type: application/json');
echo $json_data;
