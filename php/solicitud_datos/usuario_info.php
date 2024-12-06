<?php
include '../../config.php';
require ROOT_PATH . 'php/main.php';

$usuarios_sql = "SELECT * FROM datos_usuario";
$stmt = $conn->prepare($usuarios_sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json_data = json_encode($usuarios, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

header('Content-Type: application/json');
echo $json_data;
