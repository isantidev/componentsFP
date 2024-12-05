<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';

$producto_info = "SELECT * FROM producto";
$stmt = $conn->prepare($producto_info);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json_data = json_encode($productos, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

header('Content-Type: application/json');
echo $json_data;
