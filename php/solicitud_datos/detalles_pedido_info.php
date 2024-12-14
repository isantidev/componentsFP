<?php
include '../../config.php';
require ROOT_PATH . 'php/main.php';

$detalles_pedido_info = "SELECT * FROM detalles_pedido";
$stmt = $conn->prepare($detalles_pedido_info);
$stmt->execute();
$detalles_pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json_data = json_encode($detalles_pedidos, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

header('Content-Type: application/json');
echo $json_data;
