<?php
include "../config.php";
require ROOT_PATH . 'php/main.php';

$fila = '';
$pedido = $conn->prepare("SELECT * FROM pedido");
$pedido->execute();
$detalles_pedido = $conn->prepare("SELECT * FROM detalles_pedido");
$detalles_pedido->execute();

$datos_pedido = $pedido->fetchAll(PDO::FETCH_ASSOC);
$datos_detalles_pedido = $detalles_pedido->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos_pedido as $pedido) {
    $productos = array_filter($datos_detalles_pedido, function ($detalle) use ($pedido) {
        return $detalle['pedido_id'] == $pedido['pedido_id'];
    });

    $fila = '<div class="pedido_fila_contenedor">
            <ul class="pedido_fila">
                <li class="pedido_columna">
                    <p data-text="Id del pedido: ">' . $pedido['pedido_id'] . '</p>
                </li>
                <li class="pedido_columna">
                    <p data-text="Productos: ">';

    foreach ($productos as $producto) {
        $fila .= $producto['producto_nombre'] . ' : ' . $producto['cantidad'] . '<br>';
    }

    $fila .= '</p></li>
                <li class="pedido_columna">
                    <p data-text="Fecha: ">' . $pedido['fecha'] . '</p>
                </li>
                <li class="pedido_columna">
                    <p data-text="Proveedor ID: ">' . $pedido['proveedor_id'] . '</p>
                </li>
            </ul>
        </div>';

    echo $fila;
}
