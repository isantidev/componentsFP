<?php
include '../config.php';
require ROOT_PATH . 'php/main.php';
include ROOT_PATH . 'php/solicitar_datos_func.php';

$datosProducto = solicitarDatos('producto', $conn);
var_dump($datosProducto);
