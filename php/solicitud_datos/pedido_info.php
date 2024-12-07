<?php
include '../../config.php';
require ROOT_PATH . 'php/main.php';

$pedido_info = "SELECT * FROM pedido";
$stmt = $conn->prepare($pedido_info);
$stmt->execute();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json_data = json_encode($pedidos, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

header('Content-Type: application/json');
echo $json_data;
