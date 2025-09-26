<?php
include '../config.php';
include ROOT_PATH . 'php/main.php';
include ROOT_PATH . 'php/solicitar_datos_func.php';


$solicitudDatosProducto = solicitarDatos('*', 'producto', $conn);
$rowCount = $solicitudDatosProducto['row'];
$productoInfo = $solicitudDatosProducto['resultado'];

$solicitudStock = solicitarDatos('producto_id, stock', 'producto_stock', $conn);
$fetchStock = $solicitudStock['resultado'];

$stockMap = [];
foreach ($fetchStock as $stock) {
    $stockMap[$stock["producto_id"]] = $stock["stock"];
}
foreach ($productoInfo as $index => $producto) {
    $producto_id = $producto["producto_id"];
    $productoInfo[$index]["stock"] = $stockMap[$producto_id] ?? 0;
}

$producto_id = [];
$producto_nombre = [];
$producto_precio = [];
$producto_descripcion = [];
$producto_stock = [];


if ($rowCount > 0) {
    foreach ($productoInfo as $i => $producto) {
        $producto_id[$i] = !empty($producto['producto_id']) ? $producto['producto_id'] : 'No registrado';
        $producto_nombre[$i] = !empty($producto['nombre']) ? $producto['nombre'] : 'No registrado';
        $producto_precio[$i] = !empty($producto['precio']) ? $producto['precio'] : 'No registrado';
        $producto_descripcion[$i] = !empty($producto['descripcion']) ? $producto['descripcion'] : 'No registrado';
        $producto_stock[$i] = !empty($producto['stock']) ? $producto['stock'] : 0;
    }
}

$fila = '';

for ($i = 0; $i < $rowCount; $i++) {
    $fila = '<div class="producto_fila_contenedor">
                <ul class="producto_fila titulo_fila">
                    <li class="producto_columna">
                        <p data-text="ID: ">' . $producto_id[$i] . '</p>
                    </li>
                    <li class="producto_columna">
                        <p data-text="Nombre: ">' . $producto_nombre[$i] . '</p>
                    </li>
                    <li class="producto_columna">
                        <p data-text="Precio: ">$ ' . $producto_precio[$i] . '</p>
                    </li>
                    <li class="producto_columna">
                        <p data-text="Stock: ">' . $producto_stock[$i] . '</p>
                    </li>
                    <li class="producto_columna columna_descripcion">
                        <p data-text="Descripción: ">' . $producto_descripcion[$i] . '</p>
                    </li>
                </ul>
            </div>';
    echo $fila;
}
